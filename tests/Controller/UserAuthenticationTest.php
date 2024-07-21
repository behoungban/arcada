<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class UserAuthenticationTest extends WebTestCase
{
    public function testLogin()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/login');

        // Vérifiez que la page de connexion s'affiche correctement
        $this->assertResponseStatusCodeSame(Response::HTTP_OK, 'La page de connexion doit s\'afficher correctement.');
        $this->assertSelectorTextContains('h1', 'Connexion', 'La page de connexion doit contenir un titre "Connexion".');

        $form = $crawler->selectButton('Se connecter')->form();
        $form['_username'] = 'arcada@example.com'; // email de l'administrateur
        $form['_password'] = 'adminpassword'; // mot de passe de l'administrateur

        $client->submit($form);

        // Ajoutez un journal pour vérifier la réponse après la soumission du formulaire
        $response = $client->getResponse();
        file_put_contents('var/log/test_response.log', $response->getContent());

        // Vérifiez que la réponse est une redirection
        $this->assertTrue(
            $response->isRedirection(),
            'La requête de connexion n\'a pas entraîné de redirection.'
        );

        // Suivre la redirection
        $client->followRedirect();

        // Vérifiez que la page redirigée contient le texte attendu (par exemple, un élément spécifique de la page d'accueil)
        $this->assertSelectorTextContains('h1', 'Bienvenue au Zoo Arcadia'); // Ajustez ce texte en fonction de votre page d'accueil
    }
}
