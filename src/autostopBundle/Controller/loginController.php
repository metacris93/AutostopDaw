<?php
namespace autostopBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use autostopBundle\Entity\Estudiante;
use autostopBundle\Modal\Login;

class loginController extends Controller
{
    public function loginAction(Request $request)
    {
        $sesion = $this->getRequest()->getSession(); 
        $em = $this->getDoctrine()->getManager();
        $repositorio = $em->getRepository('autostopBundle:Estudiante');
        /*if($sesion->has('login')){
            $login = $sesion->get('login');
            $nombre = $login->getNombre();
            $apellido = $login->getApellido();
            $sexo = $login->getSexo();
            return $this->render( 'autostopBundle:paginas:index.html.twig', array('nombre'=>$nombre, 'apellido'=>$apellido, 'sexo'=>$sexo) );
        }*/
        if($request->getMethod() == 'POST'){            
            $sesion->clear();            
            $usuario = $request->get('usuario');
            $contrasena = sha1($request->get('contrasena'));            
            $user = $repositorio->findOneBy(array('usuario'=>$usuario,'contrasena'=>$contrasena));
            if($user){
                if($sesion->has('login')){
                    $login = $sesion->get('login');
                    $nombre = $login->getNombre();
                    $apellido = $login->getApellido();
                    $sexo = $login->getSexo();
                    return $this->render( 'autostopBundle:paginas:index.html.twig', array('nombre'=>$nombre, 'apellido'=>$apellido, 'sexo'=>$sexo) );
                }else{
                    $login = new Login();
                    $login->setUsername($usuario);
                    $login->setNombre($user->getNombre());
                    $login->setApellido($user->getApellido());
                    $login->setSexo($user->getSexo());
                    $sesion->set('login', $login);
                    return $this->render( 'autostopBundle:paginas:index.html.twig', array('nombre'=>$user->getNombre(), 'apellido'=>$user->getApellido(), 'sexo'=>$user->getSexo()) );
                }                        
            }else{
                return $this->render('autostopBundle:paginas:login.html.twig');
                //return new Response("no encontro el usuario");
            }        
        }else{
            if($sesion->has('login')){
                $login = $sesion->get('login');
                $nombre = $login->getNombre();
                $apellido = $login->getApellido();
                $sexo = $login->getSexo();
                return $this->render( 'autostopBundle:paginas:index.html.twig', array('nombre'=>$nombre, 'apellido'=>$apellido, 'sexo'=>$sexo) );
            }else{
                return $this->render('autostopBundle:paginas:login.html.twig');            
            }
            //return new Response("no es metodo post");
        }        
    }
    
    public function recargarAction(){
        if($sesion->has('login')){
            $login = $sesion->get('login');
            $nombre = $login->getNombre();
            $apellido = $login->getApellido();
            $sexo = $login->getSexo();
            return $this->render( 'autostopBundle:paginas:index.html.twig', array('nombre'=>$nombre, 'apellido'=>$apellido, 'sexo'=>$sexo) );
        }
        return $this->render('autostopBundle:paginas:index.html.twig');
    }
}

