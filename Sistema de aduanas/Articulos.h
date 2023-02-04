#ifndef ARTICULOS_H
#define ARTICULOS_H
#include<string>
using namespace std;

class Articulos
{
	private:
		string nombre;
		string codigo;
		string descripcion;
		int clasificacionArancelaria;
		double peso;
		double altura;
		string color;
		double precio_sin_agravar;
		string pais_origen;
		string pais_destino;
		char fragilidad;
		int cantidad;
		
	public:
		//Constructores
		Articulos();
		Articulos(string nombre, string codigo, string descripcion, int cAran, double peso, double altura, string color,
		double precio, string paisO, string paisD){
			setNombre(nombre);
			setCodigo(codigo);
			setDescripcion(descripcion);
			setClasificacion(cAran);
			setPeso(peso);
			setAltura(altura);
			setColor(color);
			setPrecioSinAgravar(precio);
			setPaisOrigen(paisO);
			setPaisDestino(paisD);
			
		}
		~Articulos();
		
		int getCantidad(){
			return cantidad;
		}
		string getNombre(){
			return nombre;
		}
		///Metodos get
		string getCodigo(){
			return codigo;
		}
		string getDescripcion(){
			return descripcion;
		}
		int getClasificacion(){
			return clasificacionArancelaria;
		}
		double getPeso(){
			return peso;
		}
		double getAltura(){
			return altura;
		}
		string getColor(){
			return color;
		}
		double getprecioSinAgravar(){
			return precio_sin_agravar;
		}
		string getPaisOrigen(){
			return pais_origen;
		}
		string getPaisDestino(){
			return pais_destino;
		}
		char getFragilidad(){
			return fragilidad;
		}
		
		//Metodos set
		
		void setNombre(string a){
			nombre = a;
		}
		void setCantidad(int x){
			cantidad = x;
		}
		
		void setCodigo(string c){
			codigo = c;
		}
		void setDescripcion(string d){
			descripcion = d;
		}
		void setClasificacion(int cla){
			clasificacionArancelaria = cla;
		}
		void setPeso(double p){
			peso = p;
		}
		void setAltura(double alt){
			altura = alt;
		}
		void setColor(string col){
			color = col;
		}
		void setPrecioSinAgravar(double x){
			precio_sin_agravar = x;
		}
		void setPaisOrigen(string country){
			pais_origen = country;
		}
		void setPaisDestino(string country2){
			pais_destino = country2;
		}
		void setFragilidad(char f){
			fragilidad = f;
		}
};

#endif
