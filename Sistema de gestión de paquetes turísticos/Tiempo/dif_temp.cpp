//PROGRAMA QUE CALCULA LA DIFERENCIA DE DIAS ENTRE FECHAS

#include <iostream>
#include <ctime>
#include <sstream>
#include<string>
#include <stdlib.h>
using namespace std;

///TRANSFORMA UN NUMERO A STRING
string NumberToString ( int Number )
{
	stringstream ss;
	string n;
	ss << Number;
	
	return ss.str();
}

int main()
{
	string Result1,Result2;//string which will contain the result
	stringstream convert; 
	int mesE,mesS,diaE,diaS,anioE,anioS;
	int total;
	
	//FECHA DE ENTRADA
	cout << "Ingrese el dia de entrada: ";
	cin >> diaE;
	cout << "Ingrese el mes de entrada: ";
	cin >> mesE;
	cout << "Ingrese anio(Solo permitido del 2000-N/Ingresar solamente 1-N en anios): ";
	cin >> anioE;
	Result1 = "1"+ NumberToString(anioE);
	anioE = atoi(Result1.c_str());
	cout << endl;
	
	//FECHA DE SALIDA
	cout << "Ingrese el dia de salida: ";
	cin >> diaS;
	cout << "Ingrese el mes de salida: ";
	cin >> mesS;
	cout << "Ingrese anio(Solo permitido del 2000-N/Ingresar solamente 1-N en anios): ";
	cin >> anioS;
	Result2 = "1"+ NumberToString(anioS); ///Concatena el año
	anioS = atoi(Result2.c_str());
	cout << endl;
	
	///ESTABLECE LAS FECHAS
	struct tm a = {0,0,0,diaE,mesE-1,anioE}; 
    struct tm b = {0,0,0,diaS,mesS-1,anioS}; 
    time_t x = mktime(&a);
    time_t y = mktime(&b);
    if ( x != (time_t)(-1) && y != (time_t)(-1) )
    {
        double difference = difftime(y, x) / (60 * 60 * 24);
        cout << ctime(&x);
        cout << ctime(&y);
        cout << "difference = " << difference << " days" << endl;
    }
    return 0;
}
