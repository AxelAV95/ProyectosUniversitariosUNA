#include<iostream>
#include<string>
using namespace std;

///solicitar e imprimir datos solamente
///nada de get y set
class Interfaz{
	
	public:
		string solicitarNombre(){
			string name;
			cout<<"Ingrese el nombre de perro: "<<endl;
			cin>>name;
			return name;
		}
		
		string solicitarRaza(){
			string raza;
			cout<<"Ingrese la raza: "<<endl;
			cin>>raza;
			return raza;
		}
		
		int solicitarAnio(){
			int anio;
			cout<<"Ingrese el anio: "<<endl;
			cin>>anio;
			return anio;
		}
		
		string solicitarColor(){
			string color;
			cout<<"Ingrese el color: "<<endl;
			cin>>color;
			return color;
		}
		
		void imprimirPerimetro(string nombre,string raza,int anio,string color){
			
			cout << "Detalle/"<< endl;
			cout << "Nombre: " << nombre << endl;
			cout << "Raza: " << raza << endl;
			cout << "Años: " << anio << endl;
			cout << "Color: " << color << endl;
		}
		
	
	//no llamar de clases solo el main
	//no van librerias
	
};
