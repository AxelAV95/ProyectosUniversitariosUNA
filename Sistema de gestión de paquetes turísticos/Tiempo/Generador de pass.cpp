#include <iostream>
#include <cstdlib>

using namespace std;

int main()
{

    int contador=0;
    int cifras;
    int opcion;
    int cantidad = 8;
    cout << "____Generador____" << endl;
    cout << "" << endl;
    cout << "1-Minusculas" << endl;
    cout << "2-Minusculas y Mayusculas" << endl;
    cout << "3-Minusculas y Numeros" << endl;
    cout << "Numero de Cifras:" << endl;
    //cin >> cifras;
    cout << "Elige una opcion:" << endl;
    cin  >> opcion;
    switch (opcion) {

    case 1:
    do   {
        contador++;
        char mi_letra = (char)(rand() % 26 + 'a');
        cout <<mi_letra;
        }while (cantidad>= contador);
        break;


    case 2:
       do   {
        contador++;
        char mi_letra2 = (char)(rand() % 26 + 'a');
        char mi_letra3 = (char)(rand() % 26 + 'A');
        cout << mi_letra2 << mi_letra3;
        }while (cantidad >= contador);
        break;

    case 3:
       do   {
        contador++;
        char mi_letra4 = (char)(rand() % 26 + 'a');
        char mi_letra5 = (char)(rand() % 9 + '0');
        cout << mi_letra4 << mi_letra5;
        }while (cantidad >= contador);
        break;


    }

    return 0;
}
