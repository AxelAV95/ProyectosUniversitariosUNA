#ifndef EMPRESATRANSPORTE_H
#define EMPRESATRANSPORTE_H
#include<string>
using namespace std;
class EmpresaTransporte
{
	private:
		string nombre;
		int cedula_juridica;
		int anios_Exp;
		int capacidadContenedor;
		string identificador;
		
	public:
		//Constructores
		EmpresaTransporte();
		EmpresaTransporte(string nombre,int cedula_juridica,int anios,int capacidad){
			setNombre(nombre);
			setCedJuridica(cedula_juridica);
			setExp(anios);
			setCapacidadContenedor(capacidad);
			
		}
		~EmpresaTransporte();
		
		///Metodos get
		string getNombre(){
			return nombre;
		}
		int getCedulaJuridica(){
			return cedula_juridica;
		}
		int getExperiencia(){
			return anios_Exp;
		}
		int getCapacidadContenedor(){
			return capacidadContenedor;
		}
		string getIdentificador(){
			return identificador;
		}
		
		//Metodos set
		void setIdentificador(string i){
			identificador = i;
		}
		void setNombre(string n){
			nombre = n;
		}
		void setCedJuridica(int y){
			cedula_juridica = y;
		}
		void setExp(int x){
			anios_Exp = x;
		}
		void setCapacidadContenedor(int cc){
			capacidadContenedor = cc;
		}
		
		
	
};

#endif
