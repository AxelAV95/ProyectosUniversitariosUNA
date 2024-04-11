///Clase producto - Axel Andrade 
#include <iostream>
#include "Producto.cpp"

using namespace std;

int main(int argc, char** argv) {
	
	Producto n;
	
	n.setNombre('A');
	n.setCodigo(323232);
	n.setPrecio(1200);
	n.setPeso(3);
	n.setStand('G');
	n.setImpuesto(0.05);
	
	cout << "El costo total del producto es: "<< n.calcularPrecio(n.getPrecio(),n.getImpuesto());
	
	return 0;
}
