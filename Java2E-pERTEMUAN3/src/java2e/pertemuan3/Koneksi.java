/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package java2e.pertemuan3;
import java.sql.*;


/**
 *
 * @author INTEL
 */
public class Koneksi {
    private final String url="jdbc:mysql://localhost/praktikum_java2e";
    
    public Connection getKoneksi(){
        Connection con= null;
        try {
            con = DriverManager.getConnection(url, "root", "");
        } catch (SQLException e) {
            System.out.println(e.getMessage());
        }
        return con;
    }
    
}
