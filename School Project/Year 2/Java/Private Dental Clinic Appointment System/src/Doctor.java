public class Doctor extends User
{
	// Doctor specialty
	private String specialty;
	public String getSpecialty()
	{
		return specialty;
	}
	
	// Doctor credentials
	private String credentials;
	public String getCredentials()
	{
		return credentials;
	}
	
	// Doctor phoneNumber
	private String phoneNumber;
	public String getPhoneNumber()
	{
		return phoneNumber;
	}
	
	// Constructor
	public Doctor(String name, String userType, String username, String password, String phoneNumber, String specialty, String credentials)
	{
		super(name, userType, username, password);
		this.phoneNumber = phoneNumber;
		this.specialty = specialty;
		this.credentials = credentials;
	}
	
	
	@Override
	// Doctor details
	public String toString()
	{
		return "\n--ACCOUNT DETAILS--" +  "\nName: " + getName() + "\nUser Type: " + getUserType() + "\nUsername: " + getUsername() +  "\nSpecialty: " + specialty + "\nCredentials: " + credentials +"\nPhone Number: " + phoneNumber;
	}
	
}