/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package modelo.negocio;

import modelo.dominio.ListaPrincipal;
import modelo.dominio.NodoPrincipal;

/**
 *
 * @author adeve
 */
public class LogicaPrincipal {
    
    //agregar nodo ordenadamente
    public boolean insertarLetra(ListaPrincipal lp, NodoPrincipal nuevo){
        NodoPrincipal primero = lp.getPrimero();
        boolean resultado = false;
        if(primero == null || primero.getLetra() >= nuevo.getLetra()){
            nuevo.setSiguiente(primero);
            lp.setPrimero(nuevo);
            resultado = true;
        }else{
            NodoPrincipal actual = primero;
            while(actual.getSiguiente() != null && actual.getSiguiente().getLetra()  < nuevo.getLetra() ){
                actual = actual.getSiguiente();
            }
            nuevo.setSiguiente(actual.getSiguiente());
            actual.setSiguiente(nuevo);
            resultado = true;
        }
        
        return resultado;
    }
    
    //agregar ordenadamente
    public boolean agregarLetraPrincipalOrdenado(ListaPrincipal lp, NodoPrincipal nuevo) {
        boolean respuesta = false;
        NodoPrincipal actual;

        if (lp.getPrimero() == null || lp.getPrimero().getLetra() >= nuevo.getLetra()) {
            nuevo.setSiguiente(lp.getPrimero());
            lp.setPrimero(nuevo);
            respuesta = true;
        } else {
            actual = lp.getPrimero();

            while (actual.getSiguiente() != null && actual.getSiguiente().getLetra() < nuevo.getLetra()) {
                actual = actual.getSiguiente();
                nuevo.setSiguiente(actual.getSiguiente());
                actual.setSiguiente(nuevo);
            }
            respuesta = true;
        }

        return respuesta;
    }
    
    //agregar letra a la lista
    public boolean agregarLetra(ListaPrincipal le, char e) {
        NodoPrincipal nuevo = new NodoPrincipal();

        boolean respuesta = false;

        if (le.getPrimero() == null && le.getUltimo() == null) {
            nuevo.setLetra(e);
            nuevo.setSiguiente(null);
            le.setPrimero(nuevo);
            le.setUltimo(nuevo);
            respuesta = true;
        } else {
            nuevo.setLetra(e);
            le.getUltimo().setSiguiente(nuevo);
            le.setUltimo(nuevo);
            respuesta = true;
        }

        return respuesta;
    }

    
    
    //verificar letra en la lista
    public boolean verificarLetra(ListaPrincipal le, char c){
        NodoPrincipal primero = le.getPrimero();
        boolean resultado = false;
        while(primero!=null){
            if(primero.getLetra() == c){
                resultado = true;
            }
            primero = primero.getSiguiente();
        }
        
        return resultado;
    }
    
    //obtener letra de la lista
     public NodoPrincipal obtenerLetra(ListaPrincipal le, char c){
        NodoPrincipal primero = le.getPrimero();
        NodoPrincipal aux = null;
        boolean resultado = false;
        while(primero!=null){
            if(primero.getLetra() == c){
                aux = primero;
                break;
            }
            primero = primero.getSiguiente();
        }
        
        return aux;
    }
    
    
    //imprimir nodos
    public void imprimirLista(ListaPrincipal lp){
        NodoPrincipal primero = lp.getPrimero();
            while(primero!=null){
                System.out.print(primero.getLetra());
                System.out.println();
                primero = primero.getSiguiente();
            }
        
        
    }
}
