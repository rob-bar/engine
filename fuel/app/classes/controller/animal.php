<?php
class Controller_Animal extends Controller_Template 
{

	public function action_index()
	{
		$data['animals'] = Model_Animal::find('all');
		$this->template->title = "Animals";
		$this->template->content = View::forge('animal/index', $data);

	}

	public function action_view($id = null)
	{
		$data['animal'] = Model_Animal::find($id);

		is_null($id) and Response::redirect('Animal');

		$this->template->title = "Animal";
		$this->template->content = View::forge('animal/view', $data);

	}

	public function action_create()
	{
		$data = array();
		$views = array();
		
		$select = array();
		$species = Model_Specie::find('all');
		$select['-'] = '- select species -';
		foreach($species as $specie) {
			$select[$specie->id] = $specie->name;
		}
		$data['species'] = $select;
		
		if (Input::method() == 'POST')
		{
			$val = Model_Animal::validate('create');
			
			if ($val->run())
			{
				$animal = Model_Animal::forge(array(
					'name' => Input::post('name'),
					'kind' => Input::post('kind'),
					'specie_id' => Input::post('specie_id'),
					'enclosure_id' => Input::post('enclosure_id'),
				));

				if ($animal and $animal->save())
				{
					Session::set_flash('success', 'Added animal #'.$animal->id.'.');

					Response::redirect('animal');
				}

				else
				{
					Session::set_flash('error', 'Could not save animal.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Animals";
		$views['form'] = View::forge('animal/_form', $data);
		$this->template->content = View::forge('animal/create', $views);
		
	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('Animal');

		$animal = Model_Animal::find($id);

		$val = Model_Animal::validate('edit');

		if ($val->run())
		{
			$animal->name = Input::post('name');
			$animal->kind = Input::post('kind');
			$animal->specie_id = Input::post('specie_id');
			$animal->enclosure_id = Input::post('enclosure_id');

			if ($animal->save())
			{
				Session::set_flash('success', 'Updated animal #' . $id);

				Response::redirect('animal');
			}

			else
			{
				Session::set_flash('error', 'Could not update animal #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$animal->name = $val->validated('name');
				$animal->kind = $val->validated('kind');
				$animal->specie_id = $val->validated('specie_id');
				$animal->enclosure_id = $val->validated('enclosure_id');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('animal', $animal, false);
		}

		$this->template->title = "Animals";
		$this->template->content = View::forge('animal/edit');

	}

	public function action_delete($id = null)
	{
		if ($animal = Model_Animal::find($id))
		{
			$animal->delete();

			Session::set_flash('success', 'Deleted animal #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete animal #'.$id);
		}

		Response::redirect('animal');

	}


}