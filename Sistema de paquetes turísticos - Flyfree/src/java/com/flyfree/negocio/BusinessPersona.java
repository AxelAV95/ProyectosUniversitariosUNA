/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.flyfree.negocio;

import com.flyfree.datos.PersonaData;
import com.flyfree.dominio.Persona;
import java.sql.SQLException;
import java.util.LinkedList;

/**
 *
 * @author andra
 */
public class BusinessPersona {
    
    private PersonaData pd;
    
    public BusinessPersona(){
        this.pd = new PersonaData();
    }
    
    public boolean agregarPersona(Persona persona) throws SQLException{
        return pd.agregarPersona(persona);
    }
    
    public LinkedList<Persona> getMostrarPersonas() throws SQLException{
        return pd.mostrarPersonas();
    }
}
