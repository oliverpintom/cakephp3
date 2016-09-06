<h2>Nuevo Usuario</h2>
<?php
    echo $this->Form->create($user);
    //
    echo $this->Form->input('first_name');
    echo $this->Form->input('last_name');
    echo $this->Form->input('email');
    echo $this->Form->input('password');
    echo $this->Form->input('role',['options' => ['admin' => 'Administrador' , 'user' => 'Usuario']]);
    echo $this->Form->input('active');
    echo $this->Form->button('Crear Usuario');
    //
    echo $this->Form->end;
?>