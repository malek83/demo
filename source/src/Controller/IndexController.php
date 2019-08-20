<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\NodeEntity;
use App\Form\NodeForm;
use App\Request\RequestInterface;
use App\Response\HtmlResponse;
use App\Response\RedirectResponse;
use App\Response\ResponseInterface;
use App\Service\TreeService;

/**
 * Class IndexController
 * @package App\Controller
 */
class IndexController extends AbstractController implements ControllerInterface
{
    /**
     * @param RequestInterface $request
     * @return ResponseInterface
     */
    public function index(RequestInterface $request): ResponseInterface
    {
        $tree = $this->container->get(TreeService::class)->getTree();

        return new HtmlResponse(['tree' => $tree], 'tree/index.php');
    }

    /**
     * @param RequestInterface $request
     * @return ResponseInterface
     */
    public function add(RequestInterface $request): ResponseInterface
    {
        $errors = [];
        $parentId = (int)$request->get('parent_id');

        $parent = $this->container->get(TreeService::class)->getNode($parentId);
        if ($parent === null) {
            throw new \Exception('node doesn\'t exists');
        }

        $form = new NodeForm($parent);

        if ($request->getRequestType() === RequestInterface::POST && ($errors = $form->validate($request)) === true) {
            $node = new NodeEntity();
            $node->setUsername($request->get('username'));
            $node->setCreditsLeft((int)$request->get('credits_left'));
            $node->setCreditsRight((int)$request->get('credits_right'));
            $node->setDirection(strtoupper($request->get('direction')));

            $this->container->get(TreeService::class)->addNode($parent, $node);

            return new RedirectResponse('/');
        }

        $viewData = ['parent' => $parent, 'errors' => $errors];

        $viewData['username'] = $request->get('username');
        $viewData['creditsLeft'] = $request->get('credits_left');
        $viewData['creditsRight'] = $request->get('credits_right');

        return new HtmlResponse($viewData, 'tree/add.php');
    }
}
