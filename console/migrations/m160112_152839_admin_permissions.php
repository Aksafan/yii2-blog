<?php

use yii\db\Schema;
use yii\db\Migration;

class m160112_152839_admin_permissions extends Migration
{
    public function safeUp()
    {
        $auth = Yii::$app->authManager;
        // create category permission
        $createCategory = $auth->createPermission('createCategory');
        $createCategory->description = 'Create a category';
        $auth->add($createCategory);
        // update category permission
        $updateCategory = $auth->createPermission('updateCategory');
        $updateCategory->description = 'Update a category';
        $auth->add($updateCategory);
        // delete category permission
        $deleteCategory = $auth->createPermission('deleteCategory');
        $deleteCategory->description = 'Delete a category';
        $auth->add($deleteCategory);
        // create post permission
        $createPost = $auth->createPermission('createPost');
        $createPost->description = 'Create a post';
        $auth->add($createPost);
        // update post permission
        $updatePost = $auth->createPermission('updatePost');
        $updatePost->description = 'Update a post';
        $auth->add($updatePost);
        // delete post permission
        $deletePost = $auth->createPermission('deletePost');
        $deletePost->description = 'Delete a post';
        $auth->add($deletePost);
        // create comment permission
        $createComment = $auth->createPermission('createComment');
        $createComment->description = 'Create a comment';
        $auth->add($createComment);
        // update comment permission
        $updateComment = $auth->createPermission('updateComment');
        $updateComment->description = 'Update a comment';
        $auth->add($updateComment);
        // delete comment permission
        $deleteComment = $auth->createPermission('deleteComment');
        $deleteComment->description = 'Delete a comment';
        $auth->add($deleteComment);
        // create admin role
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        // initialize admin permissions
        $auth->addChild($admin, $createCategory);
        $auth->addChild($admin, $updateCategory);
        $auth->addChild($admin, $deleteCategory);
        $auth->addChild($admin, $createPost);
        $auth->addChild($admin, $updatePost);
        $auth->addChild($admin, $deletePost);
        $auth->addChild($admin, $createComment);
        $auth->addChild($admin, $updateComment);
        $auth->addChild($admin, $deleteComment);
        // initialize admin user
        $auth->assign($admin, 1);
    }
    public function safeDown()
    {
        $auth = Yii::$app->authManager;
        $auth->remove($auth->getPermission('createCategory'));
        $auth->remove($auth->getPermission('updateCategory'));
        $auth->remove($auth->getPermission('deleteCategory'));
        $auth->remove($auth->getPermission('createPost'));
        $auth->remove($auth->getPermission('updatePost'));
        $auth->remove($auth->getPermission('deletePost'));
        $auth->remove($auth->getPermission('createComment'));
        $auth->remove($auth->getPermission('updateComment'));
        $auth->remove($auth->getPermission('deleteComment'));
        $auth->remove($auth->getRole('admin'));
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
