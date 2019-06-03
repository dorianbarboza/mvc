<?php
class Alumno
{
	private $pdo;
    
    public $IdUsuario;
    public $nombre;
    public $contrasena;
    public $claveApi;
    //public $Apellido;
    //public $Sexo;
    //public $FechaRegistro;
    //public $FechaNacimiento;
    //public $Foto;
    public $correo;
    
	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Database::StartUp();     
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Listar()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM usuario");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($IdUsuario)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM usuario WHERE IdUsuario = ?");
			          

			$stm->execute(array($IdUsuario));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($IdUsuario)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM usuario WHERE IdUsuario = ?");			          

			$stm->execute(array($IdUsuario));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try 
		{
			$sql = "UPDATE usuario SET 
						nombre          = ?, 
						contrasena        = ?,
                        claveApi        = ?,
						correo            = ?
				    WHERE IdUsuario = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->nombre, 
                        $data->contrasena,
                        $data->claveApi,
                        $data->correo,
                        $data->IdUsuario
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Alumno $data)
	{
		try 
		{
		$sql = "INSERT INTO usuario (nombre, contrasena, claveApi, correo) 
		        VALUES (?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->nombre,
                    $data->contrasena, 
                    $data->claveApi, 
                    $data->correo
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}