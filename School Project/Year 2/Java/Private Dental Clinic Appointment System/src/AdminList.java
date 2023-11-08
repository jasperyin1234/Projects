import java.io.*;
import java.util.*;

public class AdminList 
{
	// List of Admin
	private ArrayList <Admin> adminList;
	
	// Get Admin list 
	public Admin[] getAdminList()
	{
		Admin[] permanentList = new Admin [adminList.size()];
		for (int i = 0; i < adminList.size(); i++) 
		{
			permanentList[i] = adminList.get(i);
		}
		return permanentList;
	}
	
	// Constructor
	public AdminList()
	{
		adminList = new ArrayList <Admin>();
	}
	
	// Record new Admin into array list 
	public void recordAdmin(Admin a)
	{
		adminList.add(a);
	}
		
	// Get number of Admin 
	public int getNumberOfAdmin()
	{
		return adminList.size();
	}
	
	// Displaying Admin info in a table *might delete
	public void displayAdminList()
	{
		System.out.printf("%40s", "---ADMIN LIST---\n");
		System.out.println("--BIL-------------NAME------------USERNAME------PASSWORD------");
		for(int i = 0; i < adminList.size(); i++)
		{
			System.out.printf("%-10d%-25s%-12s%-20s\n", (i+1), adminList.get(i).getName(), adminList.get(i).getUsername(), adminList.get(i).getPassword());
		}
	}
	
	
	// Find Admin by username and password *might delete 
	public Admin findAdmin(String username, String password)
	{
		Admin admin = null;
		boolean found = false;
		int i =0;
		int count = getNumberOfAdmin();
		
		while(i< count && !found)
		{
			admin = adminList.get(i);
			if((admin.getUsername().equals(username)) && (admin.getPassword().equals(password)))
				found = true;
			else 
				i++;
		}
		if (found)
			return admin;
		else 
			return null;
	}
	
	// Read Admin list from textfile
	public void inputAdminList()
	{
		try
		{
			// import Admin text file
			File adFile = new File("Admin.txt");
			Scanner inputFile = new Scanner(adFile);
			while(inputFile.hasNext())
			{
				String readData = inputFile.nextLine();
				StringTokenizer token = new StringTokenizer(readData, "[|]");
				
				String inAdminName = token.nextToken();
				String inUsertype = token.nextToken();
				String inUsername = token.nextToken();
				String inPassword = token.nextToken();		
				Admin adminlist = new Admin(inAdminName, inUsertype, inUsername, inPassword);
				recordAdmin(adminlist);
			}
			inputFile.close();
		}
		catch(FileNotFoundException e)
		{
			System.out.println("Error opening Patient file");
		}
	}
	
	// Write Admin list to textfile
	public void outputAdminList()
	{			
		try
		{
			File outFile = new File("Admin.txt");
			PrintWriter outputFile = new PrintWriter(outFile);
			
			for(int i = 0; i < adminList.size(); i++)
			{
				outputFile.println(adminList.get(i).getName() + "|" + 
						adminList.get(i).getUserType() + "|" +
						adminList.get(i).getUsername() + "|" +
						adminList.get(i).getPassword());
			}
			outputFile.close();
		}
		catch(FileNotFoundException e)
		{
			System.out.println("Error opening Doctor file");
		}
	}
}