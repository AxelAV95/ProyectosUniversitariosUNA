#ifndef ENTIDAD_H
#define ENTIDAD_H
#include <string>
using namespace std;

class Entidad
{

	private:
		
		int empleados;
		int cedula_jurid;
    	string tipoEmpresa;
    	string nombre;
		string representante;
		string tipo_sociedad;
		string ubicacion;
		string email;
	
	public:
		Entidad();
		//Constructores
		Entidad(int empleados,int cedula_jurid,string tipoEmpresa,string nombre, string representante, string tipo_sociedad, string ubicacion, string email){
			setEmpleados(empleados);
			setCedulaJuridica(cedula_jurid);
			setTipoEmpresa(tipoEmpresa);
			setNombre(nombre);
			setTipoSociedad(tipo_sociedad);
			setUbicacion(ubicacion);
			setEmail(email);
		}
		
		~Entidad();
		//Metodos get
		int getCedulaJuridica(){
			return cedula_jurid;
		}
		int getEmpleados(){
        	return empleados;
    	}
    	string getNombre(){
			return nombre;
		}
	
		string getRepresentante(){
			return representante;
		}
	
		string getTipoSociedad(){
			return tipo_sociedad;
		}
	
		string getUbicacion(){
			return ubicacion;
		}
	
		string getEmail(){
			return email;
		}
		
		string getEmpresa(){
        	return tipoEmpresa;
    	}
	
    	//Metodos set
    	void setCedulaJuridica(int x){
			cedula_jurid = x;
		} 
		
    	void setEmpleados(int x){
        	empleados = x;
    	}
    
    	void setTipoEmpresa(string e){
        	tipoEmpresa = e;
    	}
    	void setTipoSociedad(string ts){
    		tipo_sociedad = ts;
		}
    	
    	void setNombre(string n){
			nombre = n;
		}
	
		void setRepresentante(string r){
			representante = r;
		}
	
		void setUbicacion(string u){
			ubicacion = u;
		}
		
		void setEmail(string e){
			email = e;
		}
    	
    
    	void TipoEmpresa(int x){
        
        
        	if(1 <= x && x <= 5){
            
            	setTipoEmpresa("Microempresa\n");
        	}
        	else if(6 <= x && x <=30 ){
            	setTipoEmpresa("Pequeña empresa\n");
        	}
        	else if(31 <= x && x <=100 ){
            	setTipoEmpresa("Mediana Empresa\n");
        	}
        	else if(100 <= x && x <=9999 ){
            	setTipoEmpresa("Más grande\n");
        	}
        
        
        
        
        
    		}
		
};

#endif
