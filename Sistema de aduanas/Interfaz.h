#ifndef INTERFAZ_H
#define INTERFAZ_H
#include<iostream>
#include<string>
#include "EmpresaTransporte.h"
#include "Aduana.h"
#include "Articulos.h"
using namespace std;
/*Descripcion: Contiene todas los metodos necesarios para pedir y mostrar datos*/

class Interfaz
{
	public:
		Interfaz();
		~Interfaz();
		
		
		
		string solicitarEmpresa(){
			string empresa;
			
			cin >> empresa;
			return empresa;
		}
		
		int SolicitarCedulaJuridica(){
			int x;
			cin>>x;
			return x;
		}
		
		int SolicitarEmpleados(){
			int x;
			cin>>x;
			return x;
		}
		string SolicitarRepresentante(){
			string representante;
			
			getline(cin,representante);
			getline(cin,representante);
			return representante;
		}
		string SolicitarTipoSociedad(){
			string TS;
			
			
			getline(cin,TS);
			return TS;
		}
		
		string SolicitarUbicacion(){
			string u;
			
			getline(cin,u);
			getline(cin,u);
			return u;
		}
		
		string SolicitarEmail(){
			string email;
			
			
			getline(cin,email);
			return email;
		}
		
		int SolicitarExperiencia(){
			int x;
			cin>>x;
			return x;
		}
		int SolicitarCapacidad(){
			int x;
			cin>>x;
			return x;
		}
		
		string SolicitarAgencia(){
			string a;
			
			getline(cin,a);
			getline(cin,a);
			return a;
		}
		
		string SolicitarIdentificador(){
			string identificador;
			
			getline(cin,identificador);
			return identificador;
		}
		
		
		string SolicitarPais(){
			string pais;
			getline(cin,pais);
			getline(cin,pais);
			return pais;
		}
		string SolicitarPaisDestino(){
			string pais;
		
			getline(cin,pais);
			return pais;
		}
		string SolicitarID(){
			string ID;
			cin >> ID;
			return ID;
		}
		
		string SolicitarCodigo(){
			string codigo;
		
			cin >> codigo;
			return codigo;
		}
		
		string SolicitarCodigoProducto(){
			string codigo;
			
			getline(cin,codigo);
			return codigo;
		}
		
		int SolicitarCantidad(){
			int x;
			cin >> x;
			
			return x;
		}
		double SolicitarPrecio(){
			double x;
			cin >> x;
			return x;
		}
		double SolicitarPlaca(){
			double x;
			cin >> x;
			return x;
		}
		//Metodo que llena el contenedor, recibe un parametro n que será el numero de productos///
		//Contiene todas las variables que almacenarán ciertos datos, ya sea total del precio o peso//
		//Contiene ciclos que se encargaran de llenar la matriz//
		void LlenarContenedor(int n){
			
			double PesoMaximo = 21770;
			double aux2 = 0; //aux del peso
			double contenedor[n][3];
			double totalPrecio = 0;
			double aux = 0;
			double CostoTotalAPagar = 0;
			double impuesto = 0.16345;
			double kilo = 0.0978;
			double PrecioTransporte = 0;
			
			///Inicializa todos los elementos
			for(int i = 0; i < n; i++){
				for(int j = 0; j <= 3; j++){
					contenedor[i][j] = 0;
				}
			}
			///LLena los datos 
			system("cls");
			cout << "Ingrese los datos correspondientes a los articulos\nprocedentes a enviar en el contenedor: \n\n";
		
				for(int i = 0; i < n; i++){
					
					if(aux2 <= PesoMaximo){
					cout << "--------------------" << endl;
					cout << "Ingrese el codigo: ";
					cin >> contenedor[i][0];
					cout << "Ingrese la cantidad: ";
					cin >> contenedor[i][1];
					cout << "Ingrese precio: ";
					cin >> contenedor[i][2];
					cout << "Ingresar peso: ";
					cin >> contenedor[i][3];
					cout << "--------------------" << endl;
					totalPrecio = totalPrecio + contenedor[i][2]; //alamacenara el total del precio de articulos
					aux2 = aux2 + contenedor[i][3]; //corrobororará que el peso no exceda a lo establecido
					}
					///Si se ingresan un numero especifico de articulos y el peso de estos 
					///excede el limite del peso maximo, inmediatemente se detendrá el ingreso
					///de los mismos..
					
					
					
					
					cout << "\n";
					
					
				}
			
			system("cls");
			
			///Impuesto aplicado
			CostoTotalAPagar = impuesto * totalPrecio;
			///Porcentaje a los kilos
			PrecioTransporte = kilo * aux2; ///aux2 almacena el total del peso de todos los articulos
			
			cout << "------------------------------------------------------\n";
			cout << "\t\t\tContenedor\n\t\t\tArticulos\n";
			cout << "Codigo\t\tCantidad\tPrecio\t\tPeso\n";
			
			///Muestra los datos registrados
			for(int i = 0; i < n; i++){
				for(int j = 0; j <= 3; j++){
					
					cout << contenedor[i][j] << "\t\t";
					
				}
			
			cout << "\n";
			}
			cout << "------------------------------------------------------\n";
			////Muestra ultimos datos
		cout << "\nTotal de precio en articulos: " << totalPrecio << endl;
		cout << "Costo total de articulos con impuesto: " <<CostoTotalAPagar << endl;	
		cout << "Costo de transporte: " << PrecioTransporte << endl;
		
		
		
		
		
		}
		
		
	
	
	

	

};

#endif
