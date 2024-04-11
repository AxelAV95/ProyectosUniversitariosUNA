class Empleado : public Persona{
	private:
		string grado;
		
	public:
		
		string getGrado(){
			return grado;
		}
		
		void setGrado(string grado){
			grado = grado;
		}
		
		void contratar();
};
