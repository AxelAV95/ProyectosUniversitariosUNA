/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package proyectoed2;

import modelo.negocio.LogicaPrincipal;
import modelo.negocio.LogicaArbol;
import modelo.datos.Datos;
import modelo.dominio.Arbol;
import modelo.dominio.ListaPalabras;
import modelo.dominio.ListaPrincipal;
import modelo.dominio.Nodo;
import modelo.dominio.NodoArbol;
import modelo.dominio.NodoPrincipal;
import static modelo.negocio.LogicaArbol.listaLetras;
import modelo.negocio.LogicaPalabras;
import vista.GUIPrincipal;



/**
 *
 * @author adeve
 */
public class Principal {

    private static Arbol a = new Arbol(new Nodo('a'));

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        // TODO code application logic here
        
        new GUIPrincipal().setVisible(true);
    }

}
