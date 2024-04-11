#include <iostream>
#include<stdlib.h>
#include <time.h>

using namespace std;

int main(int argc, char** argv) {
	int size =5;
	int aleatorio;
	int cantidad;
	int descuento = 0;
	int total = 0;
	
	
	cout << "Ingrese la cantidad de compras: ";
	cin >> cantidad;
	if(cantidad < 10000){
		cout << "No aplica la promocion!";
		exit(0);
	}else{
		srand(time(NULL));
		for(int i = 0; i < 5;i++){
			aleatorio=rand()%size;
		}
		if(aleatorio == 0){
			cout << "Bola blanca!\nNo hay descuento!";
		}else if(aleatorio == 1){
			cout << "Bola roja\n10% Descuento\n";
			descuento = (cantidad*10)/100;
			total = cantidad - descuento;
			cout << total;
		}else if(aleatorio == 2){
			cout << "Bola azul\n20% Descuento\n";
			descuento = (cantidad*20)/100;
			total = cantidad - descuento;
			cout << total;
		}else if(aleatorio == 3){
			cout << "Bola verde\n30% Descuento\n";
			descuento = (cantidad*30)/100;
			total = cantidad - descuento;
			cout << total;
		}else if(aleatorio = 4){
			cout << "Bola amarilla\n50% Descuento\n";
			descuento = (cantidad*50)/100;
			total = cantidad - descuento;
			cout << total;
		}
		
		
	}
	
	


	
	
	
	
	return 0;
}
