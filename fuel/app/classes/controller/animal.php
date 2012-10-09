<?php
class Controller_Animal extends Controller_Template 
{

	public function action_index()
	{
		$config = array(
		    'pagination_url' => 'animal/index/',
		    'total_items' => DB::count_records('animals'),
		    'per_page' => 10,
		    'uri_segment' => 3,
		    'template' => array(
		        'wrapper_start' => '<div class="my-pagination" style="margin:30px auto"> ',
		        'wrapper_end' => ' </div>',
		    )
		);

		Pagination::set_config($config);
				
		$data['animals'] = Model_Animal::find('all', array(
			'limit' => Pagination::$per_page,
			'offset' => Pagination::$offset,
			"related"=> array("enclosure","specie")
		));
		
		$data['pagination'] = Pagination::create_links();
		$this->template->title = "Animals";
		$this->template->content = View::forge('animal/index', $data, false);

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
		
		$select_species = array();
		$select_enclosures = array();
		$species = Model_Specie::find('all');
		$enclosures = Model_Enclosure::find('all');
		$select_species['-'] = '- select species -';
		$select_enclosures['-'] = '- select enclosure -';
		
		foreach($species as $specie) {
			$select_species[$specie->id] = $specie->name;
		}
		
		foreach($enclosures as $enclosure) {
			$select_enclosures[$enclosure->id] = $enclosure->name;
		}
		
		$data['species'] = $select_species;
		$data['enclosures'] = $select_enclosures;
		
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
		$data = array();
		$views = array();
		
		$select_species = array();
		$select_enclosures = array();
		$species = Model_Specie::find('all');
		$enclosures = Model_Enclosure::find('all');
		$select_species['-'] = '- select species -';
		$select_enclosures['-'] = '- select enclosure -';
		
		foreach($species as $specie) {
			$select_species[$specie->id] = $specie->name;
		}
		
		foreach($enclosures as $enclosure) {
			$select_enclosures[$enclosure->id] = $enclosure->name;
		}
		
		$data['species'] = $select_species;
		$data['enclosures'] = $select_enclosures;
		
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
		$views['form'] = View::forge('animal/_form', $data);
		$this->template->content = View::forge('animal/edit', $views);
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