# laravel-solid-design-example

This is a basic laravel project, using some solid design principles and TDD

## Implementations

In this project we have implemented the following principles

[x] Single Responsibility Principle </br>
[x] Interface Segregation Principle </br>
[x] Open-closed Principle </br>
[x] Dependency Inversion Principle

Explanation: With Laravel we normally have a Controller which does more than one thing, by default its gonna have the following 
methods [index, store, show, destroy, etc...]. 
Following the Single Responsibility principle I decided to split every single function into a class, avoiding the class to do 
more than one operation. And every class will have its own `Service` responsible for all the business logic.

In addition, for every `Service` we a have `Repository` which is responsible for persisting data into Database, once again we
isolate the database operations responsibility from the `Service` and let the `Repository` handle all the data persistancy.
Leaving our `Services` much more readable, cleaner and easier to maintain.


