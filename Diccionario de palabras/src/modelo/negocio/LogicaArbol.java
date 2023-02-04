/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package modelo.negocio;

import modelo.dominio.Arbol;

import modelo.dominio.Nodo;
import modelo.dominio.ListaLetras;

/**
 *
 * @author adeve
 */
public class LogicaArbol {

    public static String resultado = ""; //almacena letras que se recorren en el arbol
    public static String palabrasArbol = "";  //auxiliar que guarda las palabras del arbol una vez se recorran
    public static boolean resultadoPalabraArbol = false; //auxiliar que guarda el resultado de si una palabra ingresada es valida o no
    public static String inorden = ""; //guarda el recorrido in orden
    public static ListaLetras listaLetras = new ListaLetras(); //lista temporal para almacenar nodos del arbol similares a las palabras

    /*
     Funcionalidad: Agrega una palabra a un arbol
     Parámetros que recibe: Arbol, palabra
     Parámetros que regresa: ninguno
     */
    public void insertarLetra(Arbol a, String palabra) {
        Nodo raiz = a.getRaiz();
        int i = 1;
        System.out.print(raiz.getLetra() + "\n");
        for (i = 1; i < palabra.length(); i++) {
            System.out.print("Iteracion " + i + " " + palabra.charAt(i) + "\n");

            if (raiz.getHijo() == null) {

                raiz.setHijo(new Nodo(palabra.charAt(i)));
                raiz = raiz.getHijo();
                System.out.print(raiz.getLetra() + "\n");

            } else {

                System.out.print("Hijo de raiz actual: " + raiz.getHijo().getLetra() + "\n");

                if (raiz.getHijo().getLetra() == palabra.charAt(1)) {
                    System.out.print("Si es igual la raiz" + "\n");
                    System.out.print("Raiz actual: " + raiz.getLetra() + "\n");
                    raiz = raiz.getHijo();
                    System.out.print("Nueva Raiz actual: " + raiz.getLetra() + "\n");
                } else {
                    raiz = raiz.getHijo();
                    System.out.print("Nueva Raiz actual: " + raiz.getLetra() + "\n");
                    if (raiz.getHermano() == null) {
                        System.out.print("Nueva Raiz actual: " + raiz.getLetra() + " no tiene hermanos" + "\n");
                        raiz.setHermano(new Nodo(palabra.charAt(i)));
                        System.out.print("Nueva Raiz actual: " + raiz.getLetra() + " tendra hermano " + raiz.getHermano().getLetra() + "\n");
                        raiz = raiz.getHermano();
                    } else {
                        Nodo hermano = raiz.getHermano();
                        System.out.print("Raiz actual: " + raiz.getLetra() + "\n");
                        while (hermano != null) {
                            System.out.print("Raiz actual: " + raiz.getLetra() + " tiene los hermanos: " + hermano.getLetra() + "\n");
                            System.out.print("La letra actual es: " + palabra.charAt(i) + "\n");
                            if (hermano.getLetra() == palabra.charAt(i)) {
                                System.out.print("Si es igual al hermano\n");

                                raiz = hermano;
                                System.out.print("Raiz actual: " + raiz.getLetra() + "\n");
                            } else {
                                System.out.print("No es igual al hermano\n");
                                System.out.print("Raiz actual tendra hermano: " + palabra.charAt(i) + "\n");
                                hermano.setHermano(new Nodo(palabra.charAt(i)));
                                System.out.print("Nuevo hermano: " + raiz.getHermano().getLetra() + "\n");
                                raiz = hermano.getHermano();
                                System.out.print("Raiz actual: " + raiz.getLetra() + "\n");
                            }

                            hermano = hermano.getHermano();
                        }
                    }
                }

            }
            // break;
        }

        raiz.setLimite(true);

    }

    /*
     Funcionalidad: Valida una palabra del árbol
     Parámetros que recibe: Arbol, palabra
     Parámetros que regresa: verdadero o falso según el resultado
     */
    public boolean validarPalabra(Arbol a, String palabra) {
        Nodo root = a.getRaiz();
        String aux = "";

        if (root == null) {
            return resultadoPalabraArbol;
        } else {
            /*Busca todas los nodos que tienen coincidencia con la
             letra del string, y se concatenan en un string*/
            for (int i = 0; i < palabra.length(); i++) {
                char c = palabra.charAt(i);
                aux = corroborarAux(root, c);
            }

        }

        /*
         Si la palabra concatenada es  igual a la palabra 
         pasada por parámetro, devuelve el resultado
         */
        if (palabra.equals(eliminarLetrasDuplicadas(aux))) {
            resultadoPalabraArbol = true;

        } else if (!palabra.equals(eliminarLetrasDuplicadas(aux))) {
            resultadoPalabraArbol = false;

        }

        return resultadoPalabraArbol;
    }

    /*
     Funcionalidad: Corrobora una palabra en un arbol
     Parámetros que recibe: Arbol, palabra
     Parámetros que regresa: verdadero o false
     */
    public boolean corroborarPalabra(Arbol a, String palabra) {

        boolean respuesta = false;

        /*
         Recorre letra por letra y se examina en un método 
         auxiliar, que guardará los nodos en una lista auxiliar
         */
        for (int i = 0; i < palabra.length(); i++) {
            corroborarLetra(a.getRaiz(), palabra.charAt(i));
        }

        /*
         Si el ultimo de la lista auxiliar tiene limite 
         de palabra(es decir, que ahi termina), devuelve el resultado
         */
        if (listaLetras.getUltimo().isLimite()) {
            respuesta = true;
        }

        limpiarListaLetras(listaLetras);

        return respuesta;

        /*Nodo root = a.getRaiz();
         String aux = "";

         if (root == null) {
         return resultadoPalabraArbol;
         } else {
         for (int i = 0; i < palabra.length(); i++) {
         char c = palabra.charAt(i);
         aux = corroborar2(root, c);
         }

         }

         if (palabra.equals(eliminarLetrasDuplicadas(aux))) {
         resultadoPalabraArbol = true;
         //System.out.print("Esta palabra ya fue ingresada ");
         } else if (!palabra.equals(eliminarLetrasDuplicadas(aux))) {
         resultadoPalabraArbol = false;
         //System.out.print("No ha sido ingresada" );
         }*/
        //  System.out.print(aux);
        /* for(int i = 1; i < palabra.length();i++){
         char c = palabra.charAt(i);
            
            
         if(raiz.getHijo() != null){
         while(raiz.getHermano()!=null){
         raiz = raiz.getHermano();
         }
         if(raiz.getLetra() == c){
         aux += raiz.getLetra();
         }
         // raiz.setHermano(new Nodo(c));
         raiz = raiz.getHermano();
         }else{
         //  System.out.print(i+"-"+c + "\n");
         // System.out.print(raiz.getLetra()+" "+ c + "\n");
         if(raiz.getLetra() == palabra.charAt(i-1)  && raiz.getHijo() != null){
         Nodo hijo = raiz.getHijo();
                     
                    
         if(hijo.getHijo() == null){
                        
         hijo.setHermano(new Nodo(c));
         }else{
         hijo.getHijo().setHermano(new Nodo(palabra.charAt(i+1)));
         raiz = raiz.getHijo().getHijo().getHermano();
         }
         }
         raiz.setHijo(new Nodo(c));
         //  System.out.print(raiz.getLetra());
                
                
         raiz = raiz.getHijo();
                
                
               
               
         //break;   
         }
         }*/
        // return resultadoPalabraArbol;
    }

    /*
     Funcionalidad: Muestra los datos del árbol
     Parámetros que recibe: Arbol raiz
     Parámetros que regresa: ninguno
     */
    public void mostrar(Nodo raiz) {
        //Nodo raiz = a.getRaiz();
        System.out.print(raiz.getLetra());

        while (raiz != null) {
            if (raiz.getHijo() != null) {
                // System.out.print(raiz.getHijo().getLetra());
                mostrar(raiz.getHijo());
                if (raiz.getHijo().getHermano() != null) {
                    Nodo hermano = raiz.getHijo().getHermano();
                    while (hermano != null) {
                        System.out.print(hermano.getLetra());
                        hermano = hermano.getHermano();

                        mostrar(hermano);
                    }
                    raiz = raiz.getHijo();
                }
            }
            raiz = raiz.getHijo();
            // mostrar(raiz);
        }
    }

    /*
     Funcionalidad: Muestra los datos del árbol recursivamente
     Parámetros que recibe: Arbol raiz
     Parámetros que regresa: ninguno
     */
    public void recorrerArbol(Nodo root) {
        if (root == null) {
            return;
        }

        while (root != null) {

            System.out.print(root.getLetra() + " ");

            if (root.getHijo() != null) {

                recorrerArbol(root.getHijo());
            }
            root = root.getHermano();
            System.out.print("\n");
        }
    }

    /*
     Funcionalidad: Obtiene todas las palabras del arbol y se concatenan a un string
     Parámetros que recibe: Arbol raiz, caracter
     Parámetros que regresa: ninguno
     */
    public String obtenerPalabrasArbol(Nodo raiz, char c) {
        String aux = "";
        obtenerPalabrasArbolAux(raiz, c); //metodo auxiliar
        aux = palabrasArbol;
        palabrasArbol = "";
        return aux;
    }

    /*
     Funcionalidad: Obtiene todas las palabras del arbol y se concatenan a un string auxiliar estatico
     Parámetros que recibe: Arbol raiz, caracter
     Parámetros que regresa: ninguno
     */
    public void obtenerPalabrasArbolAux(Nodo root, char c) {
        // Nodo aux = new Nodo(root.getLetra());
        if (root == null) {
            return;
        }
        // System.out.print(root.getLetra() + " ");
        //palabrasArbol+= String.valueOf(c);
        while (root != null) {
            palabrasArbol += root.getLetra() + "-";
            //System.out.print(root.getLetra() + " ");
            // System.out.println();
            if (root.getHijo() != null) {
                //  System.out.println();

                obtenerPalabrasArbolAux(root.getHijo(), c);
            }
            root = root.getHermano();
            palabrasArbol += "/";
        }
    }

    /*
     Funcionalidad: Metodo auxiliar que recorre el arbol
     Parámetros que recibe: Arbol raiz, caracter
     Parámetros que regresa: String con las letras
     */
    public String corroborarAux(Nodo raiz, char c) {
        //String resultado = "";
        if (raiz != null) {

            corroborarAux(raiz.getHijo(), c);
            if (raiz.getLetra() == c) {

                resultado += String.valueOf(c);

            }
            corroborarAux(raiz.getHermano(), c);

        }

        return resultado;
    }

    /*
     Funcionalidad: Elimina las letras duplicadas de un string
     Parámetros que recibe: String
     Parámetros que regresa: String modificado
     */
    public String eliminarLetrasDuplicadas(String s) {
        String result = "";

        for (int i = 0; i < s.length(); i++) {
            if (i + 1 < s.length() && s.charAt(i) != s.charAt(i + 1)) {
                result = result + s.charAt(i);
            }
            if (i + 1 == s.length()) {
                result = result + s.charAt(i);
            }
        }

        return result;
    }
    /*
     Funcionalidad: Recorre en INORDEN un arbol
     Parámetros que recibe: Arbol raiz
     Parámetros que regresa: Ninguno
     */

    public void inOrden(Nodo raiz) {
        if (raiz != null) {

            inOrden(raiz.getHijo());
            inorden += raiz.getLetra(); //concatena en una variable static auxiliar
            System.out.println(raiz.getLetra() + " ");
            inOrden(raiz.getHermano());

        }
    }

    /*
     Funcionalidad: Recorre y Corrobora la letra del arbol y lo agrega a una lista temporal
     Parámetros que recibe: Arbol raiz, caracter
     Parámetros que regresa: Ninguno
     */
    public void corroborarLetra(Nodo raiz, char c) {

        if (raiz.getLetra() == c) {
            new LogicaLetras().agregarNodoLetra(listaLetras, raiz); //agrega lista temporal

        }
       
        Nodo temp = raiz.getHijo();
        while (temp != null) {
            corroborarLetra(temp, c);
            temp = temp.getHermano();
        }
    }
    
    /*
     Funcionalidad: Limpia la lista temporal y auxiliar para un nuevo uso
     Parámetros que recibe: Lista de letras
     Parámetros que regresa: Ninguno
     */
    public void limpiarListaLetras(ListaLetras l) {
        l.setPrimero(null);
    }

    
}
