<?php

declare(strict_types=1);

namespace Authorization\Handler\Roles;

use Authorization\Model\RoleModelInterface;
use Authorization\InputFilter\Roles\DeleteFilter;
use Common\Helper\ErrorWrapperInterface as Error;
use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class DeleteHandler implements RequestHandlerInterface
{
    public function __construct(
        private RoleModelInterface $roleModel,        
        private DeleteFilter $filter,
        private Error $error,
    ) 
    {
    }
    
    /**
     * @OA\Delete(
     *   path="/authorization/roles/delete/{permId}",
     *   tags={"Authorization Roles"},
     *   summary="Delete role",
     *   operationId="authorizationRoles_delete",
     *
     *   @OA\Parameter(
     *       in="path",
     *       name="roleId",
     *       required=true,
     *       description="Role uuid",
     *       @OA\Schema(
     *           type="string",
     *           format="uuid",
     *       ),
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="Successful operation",
     *   )
     *)
     **/
    public function handle(ServerRequestInterface $request): ResponseInterface
    {   
        $this->filter->setInputData($request->getQueryParams());
        if ($this->filter->isValid()) {
            $this->roleModel->delete(
                $this->filter->getValue('id')
            );
        } else {
            return new JsonResponse($this->error->getMessages($this->filter), 400);
        }
        return new JsonResponse([]);
    }
}
