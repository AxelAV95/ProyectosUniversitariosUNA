/*Ejercicio 5*/
#include <iostream>
#include <vector>

using namespace std;
#include "Interfaz.h"
#include "Operaciones.h"



void Facturacion(){
	
	int codigo;
	string nombre;
	double precio;
	int cantidad;
	int opcion;
	int repetir;
	Operaciones op;
	Interfaz in;
	int contador = 0;
	vector<string> nombres;
	vector<int> cantidades;
	vector<double> totales;
		
	//double aux;
	double total_compra = 0;
	double total = 0;

	
	cout << "1)CODIGO A(Abarrotes)\n2)CODIGO L(Lacteos)\n3)CODIGO P(Derivado del pan)\n4)CODIGO F(Frutas)";
	do{
		
		
		cout << endl << "\nSeleccione opcion segun el codigo del producto: ";
		cin >> codigo;
		
		
		
		
	
		if(codigo == 1){
		
		nombre = in.solicitarNombreProducto();
		precio = in.solicitarPrecio();
		cantidad = in.solicitarCantidad();
		
		
		total = op.calcularImpuesto(precio,codigo,cantidad);
		
		nombres.push_back(nombre);
		cantidades.push_back(cantidad);
		totales.push_back(total);
		
	
		}else if(codigo == 2){
			
			nombre = in.solicitarNombreProducto();
			precio = in.solicitarPrecio();
			cantidad = in.solicitarCantidad();
			
			total = op.calcularImpuesto(precio,codigo,cantidad);
			nombres.push_back(nombre);
			cantidades.push_back(cantidad);
			totales.push_back(total);
		
		
	
			
		}else if(codigo == 3){
			nombre = in.solicitarNombreProducto();
			precio = in.solicitarPrecio();
			cantidad = in.solicitarCantidad();
			
			total = op.calcularImpuesto(precio,codigo,cantidad);
			nombres.push_back(nombre);
			cantidades.push_back(cantidad);
			totales.push_back(total);
		
	
			
		}else if(codigo == 4){
			nombre = in.solicitarNombreProducto();
			precio = in.solicitarPrecio();
			cantidad = in.solicitarCantidad();
			
			total = op.calcularImpuesto(precio,codigo,cantidad);
			nombres.push_back(nombre);
			cantidades.push_back(cantidad);
			totales.push_back(total);
		}	
	
		
		
		cout << "Desea agregar un nuevo producto?\n(1-Agregar producto/2-Realizar factura): ";
		cin >> opcion;
		

		
		total_compra = total_compra + total; ////Asignacion del total de productos
		
		if(opcion == 1){
		
		repetir = 1;
		
		}else if(opcion == 2){
		in.generarFactura(nombres,cantidades,totales,contador);
		cout << "\n";
		cout << "Monto total: " << total_compra << endl;
		
		cout << "\nPara regresar al menu, presione 3: ";
		cin >> opcion;
		
		if(opcion == 3){
			
		system("cls");
		int option;
		cout << "1) Elaborar factura.\n2) Salir" << endl;
		cout << "Seleccione una opcion: ";
		cin >> option;
	
		switch(option){
		
			case 1:{
				Facturacion();
				break;
			}
			case 2:{
				exit(0);
				cout << "Gracias por usar el sistema";
				break;
			}
		}
	
	
		
	
		}
		
		}
		
		
		
	}while(repetir == 1);
	
}



int main(int argc, char** argv) {
	
	int option;
		cout << "1) Elaborar factura.\n2) Salir" << endl;
		cout << "Seleccione una opcion: ";
		cin >> option;
	
		switch(option){
		
			case 1:{
				system("cls");
				Facturacion();
				break;
			}
			case 2:{
				exit(0);
				cout << "Gracias por usar el sistema";
				break;
			}
		}
	
	
		
		
	
	return 0;
}
