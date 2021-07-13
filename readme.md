# Calculator with S.O.L.I.D.
<br>
 
 SRP - The Single Responsibility Principle  
 OCP - The Open Closed Principle  
 LSP - The Liskov Substitution Principle  
 ISP - The Interface Segregation Principle  
 DIP - The Dependency Inversion Principle  


## Installation

Clone de repository

```bash
git clone https://github.com/joaoreisweb/calculator_solid.git .
```

Go to calculator folder
```bash
cd calculator
```

## Init server

```url
php -S localhost:8000
```


## Open Calculator
Go to url
```url
http://localhost:8000
```

## CMD Command line
v1 = value 1 

v2 = value 2

o = operator signal ( Accepted signals + - * / )

e = equation
```bash
php calculator_cmd.php  e=5+5

php calculator_cmd.php  v1=5 v2=5 o=+
```


## License
[MIT](https://choosealicense.com/licenses/mit/)
