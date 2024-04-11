/*TRIANGULO DE PASCAL - AXEL ANDRADE*/
#include<iostream>
#include<string>
using namespace std;

int main(){
	
	int matriz[6][13]; ///Matriz
	
	//Asigna toda la primera columna a 1
	for(int i = 0; i <=6; i++){ 
		matriz[i][0] = 1;
	}
	//Inicializa las filas y columnas en la misma posicion en 1, diagonal
	for(int i = 0; i <=6; i++){ 
		matriz[i][i] = 1;

	}
	///Calcula los coeficientes
	for(int i =2; i <=6;i++){ 
		for(int j = 1; j <i;j++){ 
			matriz[i][j] = matriz[i-1][j]+matriz[i-1][j-1]; //Fila anterior en la misma columna mas la fila anterior y la columna interior
			
		}
	}
	
	
	for(int i =0; i <6;i++){
		cout << "    " << endl;
		
		for(int espacio =0; espacio <6-i;espacio++ ){///imprime los espacios
			cout << "    ";
		}
		for(int j = 0; j <=i;j++){ 
            cout << "    ";
			cout<< matriz[i][j]<< "   ";
                        
		}
		
	}
}
	

