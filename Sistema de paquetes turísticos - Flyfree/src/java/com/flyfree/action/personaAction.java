/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.flyfree.action;

import com.flyfree.dominio.Persona;
import com.flyfree.negocio.BusinessPersona;
import com.flyfree.servlet.GuardarPersonaServlet;
import java.sql.SQLException;
import java.util.LinkedList;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import org.apache.struts.actions.DispatchAction;
import org.apache.struts.action.ActionForm;
import org.apache.struts.action.ActionMapping;
import org.apache.struts.action.ActionForward;

/**
 *
 * @author andra
 */
public class personaAction extends DispatchAction {

    /* forward name="success" path="" */
    private final static String SUCCESS = "success";

    /**
     * This is the Struts action method called on
     * http://.../actionPath?method=myAction1, where "method" is the value
     * specified in <action> element : ( <action parameter="method" .../> )
     */
    public ActionForward registrarPersona(ActionMapping mapping, ActionForm form,
            HttpServletRequest request, HttpServletResponse response)
            throws Exception {
        BusinessPersona bp = new BusinessPersona();
        Persona persona = new Persona();
        String url= "";
        String pass =request.getParameter("pass");
        persona.setNombre(request.getParameter("nombre"));
        persona.setApellido1(request.getParameter("apellido1"));
        persona.setApellido2(request.getParameter("apellido2"));
        persona.setEmail(request.getParameter("email"));
        persona.setTelefono(Integer.parseInt(request.getParameter("telefono")));
        persona.setPass(pass);
        persona.setGenero(request.getParameter("genero"));
        persona.setPais(request.getParameter("pais"));
        
         boolean inserto = false;
        try {
            inserto = bp.agregarPersona(persona);
        } catch (SQLException ex) {
            Logger.getLogger(personaAction.class.getName()).log(Level.SEVERE, null, ex);
        }
        if(inserto){
             return mapping.findForward("agregado");
        }else{
            return mapping.findForward(SUCCESS);
        }
        
    }

    /**
     * This is the Struts action method called on
     * http://.../actionPath?method=myAction2, where "method" is the value
     * specified in <action> element : ( <action parameter="method" .../> )
     */
    public ActionForward mostrarPersonas(ActionMapping mapping, ActionForm form,
            HttpServletRequest request, HttpServletResponse response)
            throws Exception {
        BusinessPersona bp = new BusinessPersona();
        LinkedList<Persona> listaPersonas = bp.getMostrarPersonas();
        boolean bandera = false;
        boolean obtuvo;
        obtuvo = !listaPersonas.isEmpty();
        
        if(obtuvo){
            request.setAttribute("Personas", listaPersonas);
             return mapping.findForward("ListaPersonas");
        }else{
            return mapping.findForward("welcome");
        }
        
        
      
    }
    
     public ActionForward myAction2(ActionMapping mapping, ActionForm form,
            HttpServletRequest request, HttpServletResponse response)
            throws Exception {
        
        return mapping.findForward(SUCCESS);
    }
}
