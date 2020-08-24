<?php
namespace App\Controllers;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 *
 * @package CodeIgniter
 */

use CodeIgniter\Controller;

class BaseController extends Controller
{

	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = [];

	/**
	 * Variable sesion, trabajando inicialmente para uso de alertas
	 * o en su defecto, si es necesario almacenar datos importantes
	 */
	public $session = null;

	/**
	 * Array data para enviar datos a vistas, entre ellos Title
	 */
	public $data = [];

	/**
	 * Constructor.
	 */
	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		helper('operaciones');
		helper('views');

		$this->session = \Config\Services::session();

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.:
		// $this->session = \Config\Services::session();
	}

	public function sendMail($type, $data)
	{
		$email = \Config\Services::email();

		$email->setFrom($data['setFromMail'], $data['setFromMsg']);
		$email->setTo($data['to']);
		// $email->setCC('another@another-example.com');
		// $email->setBCC('them@their-example.com');

		$email->setSubject($data['setSubject']);
		$viewEmail = view('Emails/' . $type, $data);
		$email->setMessage($viewEmail);

		$email->send();
	}
}
