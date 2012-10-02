<?php
class Controller_Specie extends Controller_Template 
{

	public function action_index()
	{
		$data['species'] = Model_Specie::find('all');
		$this->template->title = "Species";
		$this->template->content = View::forge('specie/index', $data);

	}

	public function action_view($id = null)
	{
		$data['specie'] = Model_Specie::find($id);

		is_null($id) and Response::redirect('Specie');

		$this->template->title = "Specie";
		$this->template->content = View::forge('specie/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Specie::validate('create');
			
			if ($val->run())
			{
				$specie = Model_Specie::forge(array(
					'name' => Input::post('name'),
				));

				if ($specie and $specie->save())
				{
					Session::set_flash('success', 'Added specie #'.$specie->id.'.');

					Response::redirect('specie');
				}

				else
				{
					Session::set_flash('error', 'Could not save specie.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Species";
		$this->template->content = View::forge('specie/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('Specie');

		$specie = Model_Specie::find($id);

		$val = Model_Specie::validate('edit');

		if ($val->run())
		{
			$specie->name = Input::post('name');

			if ($specie->save())
			{
				Session::set_flash('success', 'Updated specie #' . $id);

				Response::redirect('specie');
			}

			else
			{
				Session::set_flash('error', 'Could not update specie #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$specie->name = $val->validated('name');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('specie', $specie, false);
		}

		$this->template->title = "Species";
		$this->template->content = View::forge('specie/edit');

	}

	public function action_delete($id = null)
	{
		if ($specie = Model_Specie::find($id))
		{
			$specie->delete();

			Session::set_flash('success', 'Deleted specie #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete specie #'.$id);
		}

		Response::redirect('specie');

	}


}