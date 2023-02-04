#include <iostream>
#include<string>
#include <stdio.h>
using namespace std;
#include "Entidad.h"
#include "Contenedor.h"
#include "Interfaz.h"
#include "EmpresaTransporte.h"
#include "Aduana.h"
#include "Articulos.h"
int main(int argc, char** argv) {
    	
    	system("color 17");
    	int opcion;//Opcion a ingresar
		int repetir = 1;//Condicion del menu
		int num; ///Será la cantidad de articulos
		Entidad empresa; ///Empresa que envia el contenedor
		Entidad empresa2;//Empresa que recibe
		EmpresaTransporte ETransporte; ///Empresa transporte
		Aduana a; //Aduana 
        Interfaz n;
        Articulos p; 
        Contenedor c;
        ///Ciclo que se ejecutará mientras el usuario ingrese la opcion requerida para repetir
		do{
			
        	cout << "\t\t--------------------------------------------\t\t\n";
			cout << "\t\t  Sistema de gestion de procesos aduaneros\t\t";
			cout << "\t\t\t--------------------------------------------\t\t\n";
			cout << "\n\n\n\n";
			cout << "Elija la opcion en orden para realizar su respectivo proceso\n\n";
			cout << "------------------------------------------------------\n";
        	cout << "Paso 1)Ingresar informacion sobre entidad\nPaso 2)Ingresar informacion sobre empresa de transporte\n";
        	cout << "Paso 3)Generar boleta\nPaso 4)Salir\n\n";
        	cout << "------------------------------------------------------\n";
        
        	cout << "Opcion: ";
        	cin >> opcion;
        	system("cls");
        	//Menu
        	
        		///Datos sobre entidad
        		if(opcion == 1){
        			
        			cout << "Complete la informacion requerida sobre la empresa: \n";
        			cout << "--------------------------------------------\n";
        			cout << "Empresa: ";
					empresa.setNombre(n.solicitarEmpresa());
					cout << "Cedula juridica: ";
					empresa.setCedulaJuridica(n.SolicitarCedulaJuridica());
					cout << "Numero de empleados: ";
					empresa.TipoEmpresa(n.SolicitarEmpleados());
					cout << "Tipo de empresa: ";
					cout << empresa.getEmpresa();
					cout << "Representante: ";
					empresa.setRepresentante(n.SolicitarRepresentante());
					cout << "Tipo de sociedad: ";
					empresa.setTipoSociedad(n.SolicitarTipoSociedad());
					cout << "Ubicacion: ";
					empresa.setUbicacion(n.SolicitarUbicacion());
					cout << "Email: ";
					empresa.setEmail(n.SolicitarEmail());
					cout << "--------------------------------------------\n";
					cout << endl;
					cout << "Datos ingresados con exito!";
					
					
				}
        		///Datos sobre empresa de transporte
        		if(opcion == 2){
        			
        		
        			cout << "Complete la informacion requerida: \n";
        			cout << "--------------------------------------------\n";
        			cout << "Nombre: ";
        			ETransporte.setNombre(n.solicitarEmpresa());
        			cout << "Cedula juridica: ";
        			ETransporte.setCedJuridica(n.SolicitarCedulaJuridica());
        			cout << "Anios: ";
        			ETransporte.setExp(n.SolicitarExperiencia());
        			cout << "Capacidad contenedor: ";
        			ETransporte.setCapacidadContenedor(n.SolicitarCapacidad());
        			cout << "--------------------------------------------\n";
        			cout << endl;
					cout << "Datos ingresados con exito!";
        			
        		
        			
        			
        			
					
				}
        		//Boleta
        		if(opcion == 3){
        			
        			
        			cout << "Ingrese los datos correspondientes para llenar en la boleta: \n";
        			cout << "--------------------------------------------\n";
        			cout << "Pais de origen: ";
        			p.setPaisOrigen(n.SolicitarPais());
        			cout << "Pais de destino: ";
        			p.setPaisDestino(n.SolicitarPaisDestino());
        			cout << "Entidad que realiza el envio: ";
        			empresa.setNombre(n.solicitarEmpresa());
        			cout << "Entidad que recibe: ";
        			empresa2.setNombre(n.solicitarEmpresa());
        			cout << "Nombre de empresa transportista: ";
        			ETransporte.setNombre(n.solicitarEmpresa());
        			cout << "Identificador de empresa transportista: ";
        			ETransporte.setIdentificador(n.SolicitarID());
        			cout << "Identificador del contenedor: ";
        			c.setIdentificador(n.SolicitarID());
        			
        			cout << "Placa contenedor: ";
        			c.setPlaca(n.SolicitarPlaca());
        			cout << "Agencia aduanera: ";
        			a.setNombreAduana(n.SolicitarAgencia());
        			cout << "Codigo de agencia aduanera: ";
        			a.setCodigoAduana(n.SolicitarCodigo());
        			cout << "Ubicacion: ";
        			a.setUbicacion(n.SolicitarUbicacion());
        			cout << endl;
        			cout << "Numero de articulos: ";
        			cin >> num;
        			cout << "--------------------------------------------\n";
        			n.LlenarContenedor(num);
        			cout << "Nombre de entidad: " << a.getNombreAduana() << endl;
        			cout << "Nombre de empresa transportista: " << ETransporte.getNombre() << endl;
        			cout << "Placa de contenedor llenado: " << c.getPlaca() << endl;
        			cout << "Codigo de centro aduanero: " << a.getCodigo() << endl;
        			cout << endl;
        			cout << endl;
        			
					
					
				}
        			
        		
				///Salir
				if(opcion == 4){
					return 1;
					cout << "---------------------------------------";
					break;
				}
        			
        		
        			
        			
        		
			
        	///Iteracion de repeticion
        	cout << "Para volver al menu, ingrese 1: ";
        	cin >> repetir;
        	system("cls");
        	
        	
		}while(repetir == 1);
     
        return 0;
}


