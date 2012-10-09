<?php
class Controller_Tourguide extends Controller_Template 
{

	public function action_index()
	{
		$data['tourguides'] = Model_Tourguide::find('all', array('related' => array('visitors')));
		$this->template->title = "Tourguides";
		$this->template->content = View::forge('tourguide/index', $data);

	}

	public function action_view($id = null)
	{
		$data['tourguide'] = Model_Tourguide::find($id);
		is_null($id) and Response::redirect('Tourguide');
		$this->template->title = "Tourguide";
		$this->template->content = View::forge('tourguide/view', $data);
	}

	public function action_create()
	{
		$data = array();
		$select_rank = array();;
		$select_rank['-'] = '- select tourguide rank -';
		$select_rank['Normal'] = 'Normal Tourguide';
		$select_rank['Elite'] = 'Elite Tourguide';
		$select_rank['Freelance'] = 'Freelance Tourguide';
		$select_rank['High'] = 'High ranked Tourguide';
		$select_rank['Highest'] = 'Highest Ranked tourguide';
		$data['select_rank'] = $select_rank;
		
		if (Input::method() == 'POST')
		{
			$val = Model_Tourguide::validate('create');
			
			if ($val->run())
			{
				$tourguide = Model_Tourguide::forge(array(
					'name' => Input::post('name'),
					'rank' => Input::post('rank'),
					'max_visitors' => Input::post('max_visitors'),
				));

				if ($tourguide and $tourguide->save())
				{
					Session::set_flash('success', 'Added tourguide #'.$tourguide->id.'.');

					Response::redirect('tourguide');
				}

				else
				{
					Session::set_flash('error', 'Could not save tourguide.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Tourguides";
		$views['form'] = View::forge('tourguide/_form', $data);
		$this->template->content = View::forge('tourguide/create', $views);
	}

	public function action_edit($id = null)
	{
		$data = array();
		$select_rank = array();;
		$select_rank['-'] = '- select tourguide rank -';
		$select_rank['Normal'] = 'Normal Tourguide';
		$select_rank['Elite'] = 'Elite Tourguide';
		$select_rank['Freelance'] = 'Freelance Tourguide';
		$select_rank['High'] = 'High ranked Tourguide';
		$select_rank['Highest'] = 'Highest Ranked tourguide';
		$data['select_rank'] = $select_rank;
		
		is_null($id) and Response::redirect('Tourguide');
		$tourguide = Model_Tourguide::find($id);
		$val = Model_Tourguide::validate('edit');
		
		if ($val->run())
		{
			$tourguide->name = Input::post('name');
			$tourguide->rank = Input::post('rank');
			$tourguide->max_visitors = Input::post('max_visitors');

			if ($tourguide->save())
			{
				Session::set_flash('success', 'Updated tourguide #' . $id);

				Response::redirect('tourguide');
			}

			else
			{
				Session::set_flash('error', 'Could not update tourguide #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$tourguide->name = $val->validated('name');
				$tourguide->rank = $val->validated('rank');
				$tourguide->max_visitors = $val->validated('max_visitors');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('tourguide', $tourguide, false);
		}

		$this->template->title = "Tourguides";
		$views['form'] = View::forge('tourguide/_form', $data);
		$this->template->content = View::forge('tourguide/edit', $views);


	}

	public function action_delete($id = null)
	{
		if ($tourguide = Model_Tourguide::find($id))
		{
			$tourguide->delete();

			Session::set_flash('success', 'Deleted tourguide #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete tourguide #'.$id);
		}

		Response::redirect('tourguide');

	}


}