<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $owner = Role::create([
            'name' => 'super_admin',
            'display_name' => 'Administrateur'
        ]);

        $moderator = Role::create([
            'name' => 'moderator',
            'display_name' => 'Modérateur'
        ]);


        $student = Role::create([
            'name' => 'student',
            'display_name' => 'Étudiant'
        ]);

        $teacher = Role::create([
            'name' => 'teacher',
            'display_name' => 'Enseignant'
        ]);



        $createUser = Permission::create([
            'name' => 'create-user',
            'display_name' => 'Create Users', // optional
        ]);

        $editUser = Permission::create([
            'name' => 'edit-user',
            'display_name' => 'Edit Users', // optional
        ]);

        $readUser = Permission::create([
            'name' => 'read-user',
            'display_name' => 'Read Users', // optional
        ]);

        $deleteUser = Permission::create([
            'name' => 'delete-users',
            'display_name' => 'Delete Users', // optional
        ]);




        $createSemester = Permission::create([
            'name' => 'create-semester',
            'display_name' => 'Create Semesters', // optional
        ]);

        $editSemester = Permission::create([
            'name' => 'edit-semester',
            'display_name' => 'Edit Semesters', // optional
        ]);

        $readSemester = Permission::create([
            'name' => 'read-semester',
            'display_name' => 'Read Semesters', // optional
        ]);

        $deleteSemester = Permission::create([
            'name' => 'delete-semester',
            'display_name' => 'Delete Semesters', // optional
        ]);



        $createModule = Permission::create([
            'name' => 'create-module',
            'display_name' => 'Create Modules', // optional
        ]);

        $editModule  = Permission::create([
            'name' => 'edit-module',
            'display_name' => 'Edit Modules', // optional
        ]);

        $readModule  = Permission::create([
            'name' => 'read-module',
            'display_name' => 'Read Modules', // optional
        ]);

        $deleteModule  = Permission::create([
            'name' => 'delete-module',
            'display_name' => 'Delete Modules', // optional
        ]);


        $createLesson = Permission::create([
            'name' => 'create-lesson',
            'display_name' => 'Create Lessons', // optional
        ]);

        $editLesson = Permission::create([
            'name' => 'edit-lesson',
            'display_name' => 'Edit Lessons', // optional
        ]);

        $readLesson  = Permission::create([
            'name' => 'read-lesson',
            'display_name' => 'Read Lessons', // optional
        ]);

        $deleteLesson  = Permission::create([
            'name' => 'delete-lesson',
            'display_name' => 'Delete Lessons', // optional
        ]);



        $createExercice = Permission::create([
            'name' => 'create-exercice',
            'display_name' => 'Create Exercices', // optional
        ]);

        $editExercice = Permission::create([
            'name' => 'edit-exercice',
            'display_name' => 'Edit Exercices', // optional
        ]);

        $readExercice = Permission::create([
            'name' => 'read-exercice',
            'display_name' => 'Read Exercices', // optional
        ]);

        $deleteExercice  = Permission::create([
            'name' => 'delete-exercice',
            'display_name' => 'Delete Exercices', // optional
        ]);


        $owner -> attachPermissions(
            [
                $createUser,
                $editUser,
                $readUser,
                $deleteUser,
                $createSemester,
                $editSemester,
                $readSemester,
                $deleteSemester,
                $createModule,
                $editModule,
                $readModule,
                $deleteModule,
                $createLesson,
                $editLesson,
                $readLesson,
                $deleteLesson,
                $createExercice,
                $editExercice,
                $readExercice,
                $deleteExercice
            ]);



        $moderator -> attachPermissions(
            [
                $readUser,
                $readSemester,
                $createModule,
                $editModule,
                $readModule,
                $deleteModule,
                $createLesson,
                $editLesson,
                $readLesson,
                $deleteLesson,
                $createExercice,
                $editExercice,
                $readExercice,
                $deleteExercice
            ]);


        $teacher -> attachPermissions(
            [
                $readUser,
                $createModule,
                $editModule,
                $readModule,
                $deleteModule,
                $createLesson,
                $editLesson,
                $readLesson,
                $deleteLesson,
                $createExercice,
                $editExercice,
                $readExercice,
                $deleteExercice
            ]);



    }
}
