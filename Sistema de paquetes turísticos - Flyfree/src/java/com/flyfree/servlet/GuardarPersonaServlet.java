/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.flyfree.servlet;

import com.flyfree.datos.PersonaData;
import com.flyfree.dominio.Persona;
import java.io.IOException;
import java.io.PrintWriter;
import java.sql.SQLException;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.servlet.RequestDispatcher;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.swing.JOptionPane;

/**
 *
 * @author andra
 */
public class GuardarPersonaServlet extends HttpServlet {

    /**
     * Processes requests for both HTTP <code>GET</code> and <code>POST</code>
     * methods.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    protected void processRequest(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        Persona persona = new Persona();
        String pass =request.getParameter("pass");
        persona.setNombre(request.getParameter("nombre"));
        persona.setApellido1(request.getParameter("apellido1"));
        persona.setApellido2(request.getParameter("apellido2"));
        persona.setEmail(request.getParameter("email"));
        persona.setTelefono(Integer.parseInt(request.getParameter("telefono")));
        persona.setPass(pass);
        persona.setGenero(request.getParameter("genero"));
        persona.setPais(request.getParameter("pais"));
        
        //JOptionPane.showMessageDialog(null, persona.getPassword());
        //JOptionPane.showMessageDialog(null, pass);
        PersonaData dPersona = new PersonaData();
        boolean inserto = false;
        try {
            inserto = dPersona.agregarPersona(persona);
        } catch (SQLException ex) {
            Logger.getLogger(GuardarPersonaServlet.class.getName()).log(Level.SEVERE, null, ex);
        }
        String url= "";
        if(inserto){
            url="index.jsp";
        }else{
            url="registrarse.jsp";
        }
        RequestDispatcher despachador = request.getRequestDispatcher(url);
        despachador.forward(request, response);
    }

    // <editor-fold defaultstate="collapsed" desc="HttpServlet methods. Click on the + sign on the left to edit the code.">
    /**
     * Handles the HTTP <code>GET</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        processRequest(request, response);
    }

    /**
     * Handles the HTTP <code>POST</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        processRequest(request, response);
    }

    /**
     * Returns a short description of the servlet.
     *
     * @return a String containing servlet description
     */
    @Override
    public String getServletInfo() {
        return "Short description";
    }// </editor-fold>

}
