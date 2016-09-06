<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
    public function index()
    {
       //$users = $this->Users->find('all');
       $users = $this->paginate($this->Users);
       $this->set("users",$users);
    }
    public function view($name)
    {
        echo "Detalle de vistas, nombre:" . $name;
        exit();
    }
    
    public function add(){
        
        // La variable $user accesa a la entidad Users
        $user = $this->Users->newEntity();
        // Verificamos si la peticion esta llegando de forma correcta
        if ($this->request->is('post'))
        {
            /*
            // Para ver que datos llegan desde el formulario
            // debug es el pan de todos los dias del Framework CakePHP
            //debug($this->request->data);
            */
            // Guardamos los datos
            
            $user = $this->Users->patchEntity($user, $this->request->data);
            if($this->Users->save($user))
            {
                $this->Flash->success('El usuario a sido creado correctamente.');
                // Redireccionamos a una vista
                return $this->redirect(['controller' => 'Users', 'action' => 'index'] );    
            }
            else 
            {
                $this->Flash->error('No se puede crear el usuario.');
            }
        }
        // set para mandar la entidad al formulario
        $this->set(compact('user'));
        //
    }
}
