<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Collection;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use App\Models\Radicado;
use App\Services\PersonService;
use Carbon\Carbon;
use DB;


class RadicacionesController extends Component
{
	use WithPagination;
	use WithFileUploads;
	protected $cartService;

	public $cup,$genero,$tipoProceso,$fecha,$numero,$cuaderno,$tipoPersona;
	// persona
	public $type,$name,$email,$personType,$ethnicGroup,$gender,$address,$identification,$phone,$age,$disabled;
	public $radicado, $search, $selected_id, $pageTitle,$componentName;
	private $pagination = 3;

   /*
    public function __construct(PersonService $cartService)
    {
        $this->cartService = $cartService;
    }
    */


    public function mount()
    {
		//PersonService $cartService
		//$this->cartService = $cartService;

    	$this->pageTitle = 'Listado';
    	$this->componentName = 'Recepción y Radicación de Demandas';
    	$this->cup = $this->generate_id(4);	
    	$this->genero = 'HOMBRE';
    	$this->tipoProceso = 'ÚNICA INSTANCIA';
    	$this->tipoPersona = 'SELECCIONE';

    }


    public function render()
    {
    	//$now = Carbon::now();
    	//$uid = $now->format('His');
		//dd($uid);
    	//$this->clearPersons();
    	//$cartService = new PersonService();
    	//$this->cartService = $cartService;

		//$this->cartService->clear();

/*
		 $this->cartService->add(
		 	'5',
		 	'Melisa Albahat',
		 	'luisfax@gmail.com',
		 	'Natural',
		 	'Mestizo',
		 	'Hombre', 
		 	'Mexico',
		 	'CURP',
		 	'3511159550',
		 	'Entre 18 y 60 años',
		 	'No',
		 	'',
		 	 []
		 );
		 */


		//$content = $this->cartService->content();
        //$total = $this->cartService->total();


		 if(strlen($this->search) > 0)
		 	$data = Radicado::where('radicado', 'like', '%' . $this->search . '%')->paginate($this->pagination);
		 else
		 	$data= Radicado::orderBy('radicado','asc')->paginate($this->pagination);

		 return view('livewire.radicaciones.component',[
		 	'data' => $data,
		 	'cart' => $this->getContent()
		 ])
		 ->extends('layouts.theme.app')
		 ->section('content');
		}






	// reset values inputs
		public function resetUI()
		{
			$this->radicado ='';	
			$this->search ='';
			$this->selected_id = 0;
		}

	//events listeners
		protected $listeners = [
			'deleteRow'   => 'Destroy'		
		]; 

		public function Destroy($id)
		{
			if ($id) { 
				$radicado = Radicado::find($id);				

				$radicado->delete();

				$this->resetUI();
				$this->emit('radicado-deleted', 'Radicado Eliminado');
			}
		}



		public function generate_id($strength = 5) {
			$input = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$input_length = strlen($input);
			$random_string = '';
			for($i = 0; $i < $strength; $i++) {
				$random_character = $input[mt_rand(0, $input_length - 1)];
				$random_string .= $random_character;
			}

			$d = DB::table('INFORMATION_SCHEMA.TABLES')
			->select('AUTO_INCREMENT as id')
			->where('TABLE_SCHEMA','sysfusa')
			->where('TABLE_NAME','radicados')
			->get();

			return $d[0]->id . $random_string;
		}



		public function addPerson()
		{
			//validar si ya existe
			 $content = $this->getContent();
			 $personItem = $content->where('type',$this->type)->count();
			  if($personItem > 0)
			  {
			  	$this->emit('person-exists',"YA AGREGASTE LA PERSONA DE TIPO: {$this->type}");
			  	return;
			  }
			  

			$now = Carbon::now();
			$uid = $now->format('His') . '';
//dd($uid);
			$this->add(
				$uid,
				$this->name,
				$this->email,
				$this->type,
				$this->personType,
				$this->ethnicGroup,
				$this->gender, 
				$this->address,
				$this->identification,
				$this->phone,
				$this->age,
				$this->disabled				
			);
		}

		public function editPerson($id)
		{
			 $content = $this->getContent();
			 //$person = $content->where('id',$id);
			 $person = $content->get($id);			 
			 if($person->count() > 0)
			 {
			 	$this->name = $person['name'];
			 	$this->email = $person['email'];
			 	$this->type = $person['type'];
			 	$this->person_type = $person['person_type'];
			 	$this->ethnic_group = $person['ethnic_group'];
			 	$this->gender = $person['gender'];
			 	$this->address = $person['address'];
			 	$this->identification = $person['identification'];
			 	$this->phone = $person['phone'];
			 	$this->age = $person['age'];
			 	$this->disabled = $person['disabled'];
			 }
		}

		protected function getContent(): Collection
		{
			return session()->has('persons') ? session()->get('persons') : collect([]);
		}

		public function add($id, $name, $email, $type, $person_type, $ethnic_group, $gender, $address, $identification, $phone, $age, $disabled): void
		{
			$cartItem = $this->createCartItem($id,$name, $email, $type, $person_type, $ethnic_group, $gender, $address, $identification, $phone, $age, $disabled);

			$content = $this->getContent();

			if ($content->has($id)) {
				//$cartItem->put('quantity', $content->get($id)->get('quantity') + $quantity);
				dd('entro al has(id)');
			}

			$content->put($id, $cartItem);

			session()->put('persons', $content);
		}

		public function content(): Collection
		{
			return is_null(session()->get('persons')) ? collect([]) : session()->get('persons');
		}

		protected function createCartItem($id, $name, $email, $type, $person_type, $ethnic_group, $gender, $address, $identification, $phone, $age, $disabled): Collection
		{


			return collect([
				'id' => $id,
				'name' => $name,
				'email' => $email,
				'type' => $type,
				'person_type' => $person_type,
				'ethnic_group' => $ethnic_group,
				'gender' => $gender,
				'address' => $address,
				'identification' => $identification,
				'phone' => $phone,
				'age' => $age,
				'disabled' => $disabled
			]);
		}
		public function clearPersons(): void
    {
        session()->forget('persons');
    }
    public function removePerson($id): void
    {
    	//dd($id);
        $content = $this->getContent();
//dd($content);
        if ($content->has($id)) {
            session()->put('persons', $content->except($id));
        }
    }


	}
