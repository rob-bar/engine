<?php
class Controller_Enclosure extends Controller_Template 
{

	public function action_index()
	{
		$data['enclosures'] = Model_Enclosure::find('all', array("related"=> array("animals")));
		$this->template->title = "Enclosures";
		$this->template->content = View::forge('enclosure/index', $data);

	}

	public function action_view($id = null)
	{
		$data['enclosure'] = Model_Enclosure::find($id);

		is_null($id) and Response::redirect('Enclosure');

		$this->template->title = "Enclosure";
		$this->template->content = View::forge('enclosure/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Enclosure::validate('create');
			
			if ($val->run())
			{
				$enclosure = Model_Enclosure::forge(array(
					'name' => Input::post('name'),
					'size' => Input::post('size'),
					'extra' => Input::post('extra'),
				));

				if ($enclosure and $enclosure->save())
				{
					Session::set_flash('success', 'Added enclosure #'.$enclosure->id.'.');

					Response::redirect('enclosure');
				}

				else
				{
					Session::set_flash('error', 'Could not save enclosure.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Enclosures";
		$this->template->content = View::forge('enclosure/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('Enclosure');

		$enclosure = Model_Enclosure::find($id);

		$val = Model_Enclosure::validate('edit');

		if ($val->run())
		{
			$enclosure->name = Input::post('name');
			$enclosure->size = Input::post('size');
			$enclosure->extra = Input::post('extra');

			if ($enclosure->save())
			{
				Session::set_flash('success', 'Updated enclosure #' . $id);

				Response::redirect('enclosure');
			}

			else
			{
				Session::set_flash('error', 'Could not update enclosure #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$enclosure->name = $val->validated('name');
				$enclosure->size = $val->validated('size');
				$enclosure->extra = $val->validated('extra');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('enclosure', $enclosure, false);
		}

		$this->template->title = "Enclosures";
		$this->template->content = View::forge('enclosure/edit');

	}

	public function action_delete($id = null)
	{
		if ($enclosure = Model_Enclosure::find($id))
		{
			$enclosure->delete();

			Session::set_flash('success', 'Deleted enclosure #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete enclosure #'.$id);
		}

		Response::redirect('enclosure');

	}


}