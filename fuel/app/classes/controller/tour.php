<?php
class Controller_Tour extends Controller_Template 
{

	public function action_index()
	{
		$tours = Model_Tour::find('all');
		foreach ($tours as $tour) {
			$visitors = DB::select()->from('visitors')->where('tour_guide_id', '=', $tour->tourguide->id)->execute();
			$visitors_count = count($visitors);
			$tour->count = $visitors_count;
		}
		$data['tours'] = $tours;
		$this->template->title = "Tours";
		$this->template->content = View::forge('tour/index', $data);

	}

	public function action_view($id = null)
	{
		$data['tour'] = Model_Tour::find($id);

		is_null($id) and Response::redirect('Tour');

		$this->template->title = "Tour";
		$this->template->content = View::forge('tour/view', $data);

	}

	public function action_create()
	{
		$data = array();
		$select_tourguide = array();
		$tourguides = Model_Tourguide::find('all');
		$select_tourguide['-'] = '- select tourguide -';
		
		foreach($tourguides as $tourguide) {
			$select_tourguide[$tourguide->id] = $tourguide->name;
		}
		
		$select_enclosure = array();
		$enclosures = Model_Enclosure::find('all');
		$select_enclosure['-'] = '- select Enclosure -';
		
		foreach($enclosures as $enclosure) {
			$select_enclosure[$enclosure->id] = $enclosure->name;
		}
		
		$data['select_tourguide'] = $select_tourguide;
		$data['select_enclosure'] = $select_enclosure;
		
		if (Input::method() == 'POST')
		{
			$val = Model_Tour::validate('create');

			if ($val->run() && !in_array("-", Input::post('enclosure')))
			{
				$tour = Model_Tour::forge(array(
					'name' => Input::post('name'),
					'tour_guide_id' => Input::post('tour_guide_id'),
				));
				
				foreach (Input::post('enclosure') as $enclosure_id) {
				    $tour->enclosures[] = Model_Enclosure::find($enclosure_id);
				}
				
				if ($tour and $tour->save())
				{
					Session::set_flash('success', 'Added tour #'.$tour->id.'.');

					Response::redirect('tour');
				}

				else
				{
					Session::set_flash('error', 'Could not save tour.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Tours";
		$views['form'] = View::forge('tour/_form', $data);
		$this->template->content = View::forge('tour/create', $views);
	}

	public function action_edit($id = null)
	{
		$data = array();
		$select_tourguide = array();
		$tourguides = Model_Specie::find('all');
		$select_tourguide['-'] = '- select tourguide -';
		
		foreach($tourguides as $tourguide) {
			$select_tourguide[$tourguide->id] = $tourguide->name;
		}
		
		$data['select_tourguide'] = $select_tourguide;
		
		is_null($id) and Response::redirect('Tour');

		$tour = Model_Tour::find($id);

		$val = Model_Tour::validate('edit');

		if ($val->run())
		{
			$tour->name = Input::post('name');
			$tour->tour_guide_id = Input::post('tour_guide_id');

			if ($tour->save())
			{
				Session::set_flash('success', 'Updated tour #' . $id);

				Response::redirect('tour');
			}

			else
			{
				Session::set_flash('error', 'Could not update tour #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$tour->name = $val->validated('name');
				$tour->tour_guide_id = $val->validated('tour_guide_id');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('tour', $tour, false);
		}

		$this->template->title = "Tours";
		$views['form'] = View::forge('tour/_form', $data);
		$this->template->content = View::forge('tour/edit', $views);

	}

	public function action_delete($id = null)
	{
		if ($tour = Model_Tour::find($id))
		{
			$tour->delete();

			Session::set_flash('success', 'Deleted tour #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete tour #'.$id);
		}

		Response::redirect('tour');

	}


}