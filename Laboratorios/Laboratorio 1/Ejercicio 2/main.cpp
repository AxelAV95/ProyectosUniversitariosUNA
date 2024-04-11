#include <stdio.h>
#include <stdlib.h>
#include <iostream>

using namespace std;
#include "Interfaz.h"
#include "Operaciones.h"

int main()
{	
	int contadorPrimo = 0;
    int numero=2, n, suma=0;
    float promedio=0;
    Interfaz in;
    Operaciones op;
    
    //mientras va aumentando numero, la condicion va comprobando que numero sea primo o no
    int i = 1;
    while(i <= 100){
        if(op.verificarPrimo(numero)){
            cout << " " << numero;
            suma = suma + numero;
            ++contadorPrimo; 
            i++;
        }
        numero++;
        
    }
    promedio = op.calcularPromedio(suma,contadorPrimo);
    in.imprimir(promedio,suma,contadorPrimo);
    
    return 0;
}


