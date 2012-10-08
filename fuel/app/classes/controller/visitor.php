<?php
class Controller_Visitor extends Controller_Template 
{

	public function action_index()
	{
		$data['visitors'] = Model_Visitor::find('all');
		$this->template->title = "Visitors";
		$this->template->content = View::forge('visitor/index', $data);

	}

	public function action_view($id = null)
	{
		$data['visitor'] = Model_Visitor::find($id);

		is_null($id) and Response::redirect('Visitor');

		$this->template->title = "Visitor";
		$this->template->content = View::forge('visitor/view', $data);

	}

	public function action_create()
	{
		$data = array();
		$tourguides_select = array();
		$tourguides_select['-'] = '- select tourguide -';
		
		$tourguides = Model_Tourguide::find('all');
		
		foreach($tourguides as $tourguide) {
			$tourguides_select[$tourguide->id] = $tourguide->name;
		}
		
		$data['tourguides'] = $tourguides_select;
		
		if (Input::method() == 'POST')
		{
			$val = Model_Visitor::validate('create');
			
			if ($val->run())
			{
				$visitor = Model_Visitor::forge(array(
					'name' => Input::post('name'),
					'email' => Input::post('email'),
					'tour_guide_id' => Input::post('tour_guide_id'),
				));

				if ($visitor and $visitor->save())
				{
					Session::set_flash('success', 'Added visitor #'.$visitor->id.'.');

					Response::redirect('visitor');
				}

				else
				{
					Session::set_flash('error', 'Could not save visitor.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Visitors";
		$views['form'] = View::forge('visitor/_form', $data);
		$this->template->content = View::forge('visitor/create', $views);
	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('Visitor');

		$visitor = Model_Visitor::find($id);

		$val = Model_Visitor::validate('edit');

		if ($val->run())
		{
			$visitor->name = Input::post('name');
			$visitor->email = Input::post('email');
			$visitor->tour_guide_id = Input::post('tour_guide_id');

			if ($visitor->save())
			{
				Session::set_flash('success', 'Updated visitor #' . $id);

				Response::redirect('visitor');
			}

			else
			{
				Session::set_flash('error', 'Could not update visitor #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$visitor->name = $val->validated('name');
				$visitor->email = $val->validated('email');
				$visitor->tour_guide_id = $val->validated('tour_guide_id');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('visitor', $visitor, false);
		}

		$this->template->title = "Visitors";
		$this->template->content = View::forge('visitor/edit');

	}

	public function action_delete($id = null)
	{
		if ($visitor = Model_Visitor::find($id))
		{
			$visitor->delete();

			Session::set_flash('success', 'Deleted visitor #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete visitor #'.$id);
		}

		Response::redirect('visitor');

	}


}