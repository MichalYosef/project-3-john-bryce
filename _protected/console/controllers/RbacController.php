<?php
namespace app\console\controllers;

use app\rbac\rules\AuthorRule;
use yii\helpers\Console;
use yii\console\Controller;
use Yii;

/**
 * Creates base RBAC authorization data for our application.
 * -----------------------------------------------------------------------------
 * Creates 5 roles:
 *
 * - theCreator : you, developer of this site (super admin)
 * - admin      : your direct clients, administrators of this site
 * - employee   : employee of this site / company, this may be someone who should not have admin rights
 * - premium    : premium member of this site (authenticated users with extra powers)
 * - member     : authenticated user, this role is equal to default '@', and it does not have to be set upon sign up
 *
 * Creates 2 permissions:
 *
 * - useSalesContent  : allows premium users to use premium content
 * - manageUsers        : allows admin+ roles to manage users (CRUD plus role assignment)
 *
 * Creates 1 rule:
 *
 * - AuthorRule : allows employee+ roles to update their own content (not used by default)
 */
class RbacController extends Controller
{
    /**
     * Initializes the RBAC authorization data.
     */
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        //---------- RULES ----------//

        // add the rule (not used by default)
        $rule = new AuthorRule;
        $auth->add($rule);

        //---------- PERMISSIONS ----------//

        //---------- Sales PERMISSIONS ----------//

        // add "useSalesContent" permission
        $useSalesContent = $auth->createPermission('useSalesContent');
        $useSalesContent->description = 'Allows sales+ roles to use sales content';
        $auth->add($useSalesContent);

        $allowStudentActions = $auth->createPermission('allowStudentActions');
        $allowStudentActions->description = 'Allows all actions on student';
        $auth->add($allowStudentActions);

        $viewCourse = $auth->createPermission('viewCourse');
        $viewCourse->description = 'Allows View course';
        $auth->add($viewCourse);

        

        //---------- Manager PERMISSIONS ----------//
        // add "useAdminContent" permission
        $useAdminContent = $auth->createPermission('useAdminContent');
        $useAdminContent->description = 'Allows Admin+ roles to use Admin content';
        $auth->add($useAdminContent);

        $editCourse = $auth->createPermission('editCourse');
        $editCourse->description = 'Allows edit course';
        $auth->add($editCourse);

        // add "manageUsers" permission
        $manageUsers = $auth->createPermission('manageUsers');
        $manageUsers->description = 'Allows admin+ roles to manage users';
        $auth->add($manageUsers);
        //TODO: is not allowed to change its own role or delete himself


        //---------- Owner PERMISSIONS ----------//
        
        $editAndViewOwner = $auth->createPermission('editAndViewOwner');
        $editAndViewOwner->description = 'Allows to view and edit owner details';
        $auth->add($editAndViewOwner);

////////////////////////////////////////////////////////////
        

        //---------- ROLES ----------//

        // add "sales" role and add him permissions as childs
        $sales = $auth->createRole('sales');
        $sales->description = 'Sales user';
        $auth->add($sales); 
        $auth->addChild($sales, $useSalesContent);
        $auth->addChild($sales, $allowStudentActions);
        $auth->addChild($sales, $viewCourse);

        // add "manager" role
        $manager = $auth->createRole('manager');
        $manager->description = 'manager users.';
        $auth->add($manager); 
        // allow manager all 'sales' permissions
        $auth->addChild($manager, $sales);
        // + manager permissions
        $auth->addChild($manager, $useAdminContent);
        $auth->addChild($manager, $editCourse);
        $auth->addChild($manager, $manageUsers);

         // add "owner" role
         $owner = $auth->createRole('owner');
         $owner->description = 'owner user (only one).';
         $auth->add($owner); 
         // allow owner all 'manager' permissions
         $auth->addChild($owner, $manager);
         // + owner permissions
         $auth->addChild($owner, $editAndViewOwner);
         

        // add "theCreator" role ( this is you :) )
        // You can do everything that owner can do plus more (if You decide so)
        // $theCreator = $auth->createRole('theCreator');
        // $theCreator->description = 'theCreator! (programmer of this site)';
        // $auth->add($theCreator); 
        // $auth->addChild($theCreator, $owner);

        if ($auth) {
            $this->stdout("\nRbac authorization data are installed successfully.\n", Console::FG_GREEN);
        }
    }
}