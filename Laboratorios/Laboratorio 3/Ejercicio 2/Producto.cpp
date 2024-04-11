///Clase producto - Axel Andrade 
#include <iostream>
#include <string>

using namespace std;

class Producto{
	
	private:
	//Atributos
		char nombre;
		int codigo;
		double precio;
		double peso;
		char stand;
		double impuesto;
		
	
	public:
	//Metodos get
		char getNombre(){
		return nombre;
		}
		int getCodigo(){
		return codigo;
		}
		double getPrecio(){
		return precio;
		}
		double getPeso(){
		return peso;
		}
		char getStand(){
		return stand;
		}
		double getImpuesto(){
		return impuesto;
		}
	
	//Métodos Set
		char setNombre(char name){
		nombre = name;
		}
	
		int setCodigo(int code){
		codigo = code;
		}
	
		double setPrecio(double price){
		precio = price;
		}
		
		double setPeso(double weight){
		precio = weight;
		}
	
		char setStand(char stand){
		stand = stand;
		}
	
		double setImpuesto(double tax){
		impuesto = tax;
		}
	
		double calcularPrecio( double precio, double impuesto ){
		
		double impuesto_total = 0;
		double costo_total = 0;
		
		impuesto_total = precio * impuesto;
		costo_total = precio + impuesto_total;
		
		return costo_total;
		}
};
