import java.util.Scanner;
public class MainMenu
{
	public static void main(String[] args) 
	{
		// Local variables
		String username, password;
		int userTypeNum = 0, entryType = 0;
		boolean proceed;
		boolean invalid = true;
			
		// Scanner class
		Scanner input = new Scanner(System.in);
		
		// Read Patient list from textfile
		PatientList patientList = new PatientList();
		patientList.inputPatientList();		
		// READ Doctor list from textfile
		DoctorList doctorList = new DoctorList();
		doctorList.inputDoctorList();				
		// Read Admin list from textfile
		AdminList adminList = new AdminList();
		adminList.inputAdminList();
		// Read Appointment list from textfile
		AppointmentList appointmentList = new AppointmentList();
		appointmentList.inputAppointmentList(patientList, doctorList, patientList.getPatientList(), doctorList.getDoctorList());
			
		// Introduction Heading
		System.out.println("---------------------------------------------");
		System.out.println("LYTH Private Dental Clinic Appointment System");
		System.out.println("---------------------------------------------");
		
		// Set boolean as true (to determine if the program continues)
		proceed = true;
		
		do
		{
			// Login & Register 
			System.out.println(" ");
			System.out.println("--LOGIN MENU--");
			System.out.println("ENTER (1) to register a new Patient account\n"
					+ "Already have an account?\n"
					+ "Enter (2) to login\n"
					+ "Enter (3) to exit");
				
			// Get input & input validation
			do
			{				
				try{
					System.out.print("Please enter your choice: ");
					entryType = Integer.parseInt(input.nextLine());
	                	if (entryType < 1 || entryType > 3) 
	                		System.out.println("Invalid number. 1-3 only. Try again! ");
	                	invalid = false;
					}
				catch (NumberFormatException e) 
					{
						 System.out.print("Invalid input. Please enter numbers only. Try again! "); 
					}
			} while(entryType < 1 || entryType > 3 || invalid);		
		
			// Main Menu 
			switch(entryType)
			{
			// User choose (1)Register new Patient account
			case 1:
				patientList.registerPatient();
				break;
			
			// User choose (2)Login
			case 2:
				// Get user type & input validation
				// re-initialising invalid boolean
				invalid = true;
				do
				{
					System.out.println();
					System.out.println("--USER TYPE--");
					System.out.print("(1) Patient\n"
								+ "(2) Doctor\n"
								+ "(3) Admin\n");  
									
					try
					{
						System.out.print("Please enter user type(1 to 3): ");
						userTypeNum = Integer.parseInt(input.nextLine());  
		                	if (userTypeNum < 1 || userTypeNum > 3) 
		                	{
		                		System.out.println("Invalid number. 1-3 only. Try again! ");
		                	}
		                	invalid = false;
					}catch (NumberFormatException e) 
							{
								System.out.println("Invalid input. Please enter numbers only. Try again! "); 
							}
					
				} while(userTypeNum < 1 || userTypeNum > 3 || invalid);
								
					switch(userTypeNum)
					{
					// Login as Patient (userTypeNum == 1)
					case 1:
						System.out.println();
						System.out.println("--PATIENT LOGIN PAGE--");
						System.out.print("Enter username: ");
						username = input.nextLine();
						System.out.print("Enter password: ");
						password = input.nextLine();
									
						// Searching for Patient account
						// Prompt error message if account is not found
						if(patientList.findPatient(username,password) == null)
						{
							System.out.println("\nNO MATCH FOUND, PLEASE ENSURE USERNAME AND PASSWORD ARE CORRECT ");
							break;
						}
						
						// Show Patient name if account is found
						else
						{
							System.out.println(" ");
							System.out.println("Welcome " + patientList.findPatient(username, password).getName());
							
							// Initialize Patient choice 
							int option = 0;
							do
							{
								// Patient interface 
								System.out.println(" ");
								System.out.println("--PATIENT MENU--");
								System.out.println("(1) New appointment\n(2) View account details\n(3) View pending appointments");
								System.out.println("(4) View appointment history\n(5) View Doctor list\n(6) Cancel appointment");
								System.out.println("(7) Exit");
								
								// re-initialising invalid boolean
								invalid = true;
								do{
									try
									{
										System.out.print("Choose between 1 to 7: ");
										option = Integer.parseInt(input.nextLine());
					                	if (option < 1 || option > 7) 
					                	{
					                		System.out.println("Invalid number. 1-7 only. Try again!");
					                	}
					                	invalid = false;
									} catch (NumberFormatException e) 
										{
										 	System.out.println("Invalid input. Please enter numbers only. Try again! "); 
										}
								}while(option < 1 || option > 7 || invalid); 
								
								switch(option)
								{
								// New Appointment 
								case 1: appointmentList.newAppointment(patientList, doctorList, patientList.getPatientList(),
										doctorList.getDoctorList(), patientList.findPatient(username, password).getName());
									break;
								// View account details
								case 2: System.out.println(patientList.findPatient(username, password).toString());	
									break;
								// View pending Appointment list
								case 3: appointmentList.pendingAppointmentList(username, patientList.getPatientList(), 
										doctorList.getDoctorList());
									break;
								// View Appointment history
								case 4: appointmentList.pastApptPatientView(username);
									break;
								// View Doctor list
								case 5: doctorList.displayDoctorList();
									break;
									// Cancel Appointment
								case 6: appointmentList.cancelAppointment();
									break;
								// Exit
								case 7: 
									break;
								}
							}while(option != 7);				
						}
					break;
					// Login as Doctor (userTypeNum == 2)
					case 2: 
						System.out.println();
						System.out.println("--DOCTOR LOGIN PAGE--");
						System.out.print("Enter username: ");
						username = input.nextLine();
						System.out.print("Enter password: ");
						password = input.nextLine();
									
						// Searching for Doctor account
						// Prompt error message if account is not found
						if(doctorList.findDoctor(username,password) == null)
						{
							System.out.println("\nNO MATCH FOUND, PLEASE ENSURE USERNAME AND PASSWORD ARE CORRECT ");
							break;
						}
					
						else
						{
							// Show Doctor name if account is found
							System.out.println(" ");
							System.out.println("Welcome " + doctorList.findDoctor(username,password).getName());
							
							
							// Initialize Doctor choice	
							int option = 0;
							
							do
							{
								// Doctor interface
								System.out.println(" ");
								System.out.println("--DOCTOR MENU--");
								System.out.println("(1) View account details\n(2) View pending appointments");
								System.out.println("(3) View appointment history of own Patient\n(4) View Patient list");
								System.out.println("(5) Exit");
								
								// re-initialising invalid boolean
								invalid = true;
								do{
									try
									{
										System.out.print("Choose between 1 to 5: ");
										option = Integer.parseInt(input.nextLine());
					                	if (option < 1 || option > 5) 
					                	{
					                		System.out.println("Invalid number. 1-5 only. Try again!");
					                	}
					                	invalid = false;
									} catch (NumberFormatException e) 
										{
										 System.out.println("Invalid input. Please enter numbers only. Try again! "); 
										}
								}while(option < 1 || option > 5 || invalid); 
								
								switch(option)
								{
								// View account details
								case 1: 
									System.out.println(doctorList.findDoctor(username,password).toString());
									break;
								// View pending Appointment list
								case 2: 
									appointmentList.pendingAppointmentList(username, patientList.getPatientList(), doctorList.getDoctorList());
									break;
								// View Appointment history of own Patient 	
								case 3:
									appointmentList.pastApptDoctorView(username);
									break;
								// View Patient list
								case 4:
									patientList.displayPatientList();
									break;
								case 5:
									break;
								}															
							}while(option != 5);				
						}
					break; 	
					// Login as Admin (userTypeNum == 3)
					case 3:	
						System.out.println();
						System.out.println("--ADMIN LOGIN PAGE--");
						System.out.print("Enter username: ");
						username = input.nextLine();
						System.out.print("Enter password: ");
						password = input.nextLine();
									
						// Searching for Admin account
						// Prompt error message if account is not found
						if(adminList.findAdmin(username,password) == null)
						{
							System.out.println("\nNO MATCH FOUND, PLEASE ENSURE USERNAME AND PASSWORD ARE CORRECT ");
							break;
						}
					
						else
						{
							// Show Admin name if account is found
							System.out.println(" ");
							System.out.println("Welcome " + adminList.findAdmin(username,password).getName());
							
							
						// Initialize Admin choice
						int option = 0;
						do
						{
							// Admin interface
							System.out.println(" ");
							System.out.println("--ADMIN MENU--");
							System.out.println("(1) Add doctor\n(2) New appointment\n(3) View Patient list");
							System.out.println("(4) View doctor list\n(5) View appointment list\n(6) Cancel appointment");
							System.out.println("(7) Exit");
					
							// re-initialise invalid boolean
							invalid = true;
							do{
								try
								{
									System.out.print("Choose between 1 to 7: ");
									option = Integer.parseInt(input.nextLine());
				                	if (option < 1 || option > 7) 
				                	{
				                		System.out.println("Invalid number. 1-7 only. Try again!");
				                	}
				                	invalid = false;
								} catch (NumberFormatException e) 
									{
									 System.out.println("Invalid input. Please enter numbers only. Try again! "); 
									}
							}while(option < 1 || option > 7 || invalid); 
						
							switch(option)
							{
								// Add new Doctor
								case 1: 
									doctorList.addDoctor();
									break;
								// Create new appointment
								case 2: 
									appointmentList.newAppointment(patientList, doctorList, patientList.getPatientList(),
											doctorList.getDoctorList(), adminList.findAdmin(username,password).getName());
									break;
								// View Patient list
								case 3: 
									patientList.displayPatientList();
									break;
								// View Doctor list
								case 4:
									doctorList.displayDoctorList();
									break;
								// View all appointments
								case 5: 
									appointmentList.displayAppointmentList();
									break;
								// Cancel appointment
								case 6: 
									appointmentList.cancelAppointment();
									break;
								//Exit
								case 7:
									break;
							}	
						}while(option != 7);
						}
					}
					break;
					// Exit system
					case 3: 
						System.out.println("Thank you for using this system!");
						proceed = false;
						break;
				}
			}while(proceed);
		
		// Write data into textfile
		patientList.outputPatientList();
		doctorList.outputDoctorList();
		adminList.outputAdminList();
		appointmentList.outputApptList();
		
		input.close();
	}
}