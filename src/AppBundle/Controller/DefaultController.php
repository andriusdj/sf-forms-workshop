<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Company;
use AppBundle\Entity\Email;
use AppBundle\Entity\Person;
use AppBundle\Form\PersonType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class DefaultController
 *
 * @package AppBundle\Controller
 */
class DefaultController extends Controller
{
    /**
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request): Response
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @return Response
     * @Route("/list/people", name="person.list")
     */
    public function listPeopleAction(): Response
    {
        $people = $this->getDoctrine()->getManager()->getRepository(Person::class)->findAll();

        return $this->render('default/people_list.html.twig', ['people' => $people]);
    }

    /**
     * @return Response
     * @Route("/list/companies", name="company.list")
     */
    public function listCompaniesAction(): Response
    {
        $companies = $this->getDoctrine()->getManager()->getRepository(Company::class)->findAll();

        return $this->render('default/company_list.html.twig', ['list' => $companies]);
    }

    /**
     * @param Request     $request
     * @param Person|null $person
     *
     * @return Response
     * @Route("/person/{person}", name="person.edit")
     * @Route("/person/add", name="person.add")
     */
    public function addEditPersonAction(Request $request, Person $person = null): Response
    {
        if (!$person) {
            $person = new Person();
        }

        $form = $this->createForm(PersonType::class, $person);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->persist($person);
            $this->getDoctrine()->getManager()->flush();

            $this->redirectToRoute('person.list');
        }

        return $this->render('default/form.html.twig', ['form' => $form->createView()]);
    }

    /**
     * @param Person $person
     *
     * @return RedirectResponse
     * @Route("/person/remove/{person}")
     */
    public function removePersonAction(Person $person): RedirectResponse
    {
        // remove the person
    }

    public function addEditCompanyAction(Request $request, Company $company = null): Response
    {
        //add new or edit existing company
    }

    public function removeCompanyAction(Person $person): RedirectResponse
    {

    }
}
