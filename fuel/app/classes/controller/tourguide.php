<?php
class Controller_Tourguide extends Controller_Template 
{

	public function action_index()
	{
		$data['tourguides'] = Model_Tourguide::find('all');
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
		$this->template->content = View::forge('tourguide/create');

	}

	public function action_edit($id = null)
	{
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
		$this->template->content = View::forge('tourguide/edit');

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