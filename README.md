# laravel-solid-design-example

This is a basic laravel project, using some solid design principles and TDD

## Implementations

In this project we have implemented the following principles

[x] Single Responsibility Principle
[x] Interface Segregation Principle
[x] Open-closed Principle
[x] Dependency Inversion Principle

Explanation: With Laravel we normally have a Controller which does more than one thing, by default its gonna have the following 
methods [index, store, show, destroy, etc...]. 
Following the Single Responsibility principle I decided to split every single function into a class, avoiding the class to do 
more than one operation. And every class will have its own `Service` responsible for all the business logic.


