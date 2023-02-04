/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package controlador;

import java.io.IOException;
import modelo.dominio.Arbol;

import modelo.dominio.ListaPalabras;
import modelo.dominio.ListaPrincipal;
import modelo.dominio.Nodo;
import modelo.dominio.NodoPalabra;
import modelo.dominio.NodoPrincipal;
import modelo.negocio.LogicaArbol;

import modelo.negocio.LogicaPalabras;
import modelo.negocio.LogicaPrincipal;

/**
 *
 * @author adeve
 */
public class Controlador {
    
    //agregar letra a lista    
    public boolean agregarLetraLista(ListaPrincipal lp, NodoPrincipal nodo){
        return new LogicaPrincipal().insertarLetra(lp, nodo);
    }
            
    //verificar si letra existe
    public boolean verificarLetraPrincipal(ListaPrincipal lp, char c){
        return new LogicaPrincipal().verificarLetra(lp, c);
    }
    //obtiene una letra de la lista principal
    public NodoPrincipal obtenerLetraLista(ListaPrincipal lp, char c){
        return new LogicaPrincipal().obtenerLetra(lp,c);
    }
    
    //agregar palabra a arbol
    public void agregarPalabraArbol(Arbol a, String palabra){
        new LogicaArbol().insertarLetra(a, palabra);
    }
    
    //obtener palabras del arbol  
    public String obtenerPalabrasArbol(Nodo raiz, char c){
        return new LogicaArbol().obtenerPalabrasArbol(raiz, c);
    }
    
    
    public boolean corroborarPalabra(Arbol a, String palabra){
        return new LogicaArbol().corroborarPalabra(a, palabra);
    }
    
    
    
    
    
    //PALABRAS
    public boolean agregarPalabra(ListaPalabras le, String e){
        return new LogicaPalabras().agregarPalabra(le, e);
    }
    
    public boolean verificarPalabra(ListaPalabras le, String p){
        return new LogicaPalabras().verificarPalabra(le, p);
    }
    
    public NodoPalabra obtenerNodoPalabra(ListaPalabras le, String p){
        return new LogicaPalabras().obtenerNodoPalabra(le,p);
    }
    
    //recorridos
    public void inOrden(Nodo raiz){
         new LogicaArbol().inOrden(raiz);
    }
    
    public boolean archivarPalabras(String s) throws IOException{
        return new LogicaPalabras().archivarPalabras("lista.txt", s);
    }
    
    public boolean validarPalabra(Arbol a, String s){
        return new LogicaArbol().validarPalabra(a, s);
    }
}
