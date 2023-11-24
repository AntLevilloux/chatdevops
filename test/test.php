<?php

class HelloWorldTest extends \PHPUnit\Framework\TestCase
{

    private $db;

    protected function setUp(): void
    {
        // Connexion à la base de données
        $this->db = new PDO("mysql:host=127.0.0.1;dbname=chatdevops;charset=utf8", "root", "");
    }

    public function testConnection()
    {
        // Vérifiez que la connexion est établie
        $this->assertInstanceOf(PDO::class, $this->db);
    }

    //-----------------------------------------------------------------------------

    public function testInformationDisplay()
    {

        require_once 'C:/wamp64/www/chatdevops/Projet_chat/chat.php';

        // Capture la sortie pour vérifier l'affichage
        ob_start();
        $output = ob_get_clean();

        // Testez que la sortie contient les informations attendues
        //$this->assertStringContainsString('pseudo:', $output);
        //$this->assertStringContainsString('message:', $output);
    }

    //-----------------------------------------------------------------------------------------------------

    public function testChatPageIsAccessible()
    {
        $url = 'http://localhost/chatdevops/Projet_chat/chat.php'; // Remplacez par l'URL réel de votre page chat.php

        // Effectuez une requête HTTP GET à l'URL de la page
        $response = file_get_contents($url);

        // Vérifiez que la réponse contient une partie du contenu attendu
        $this->assertStringContainsString('antoine', $response);

        // Vérifiez également le code de réponse HTTP
        $this->assertEquals('HTTP/1.1 200 OK', $http_response_header[0], 'La page chat.php n\'a pas retourné une réponse HTTP 200.');
    }

    //-----------------------------------------------------------------------------------------------------------

}