public abstract class User
{

	// User full name variable
	private String name;
	public String getName()
	{
		return name;
	}
	
	// User type variable
	private String userType;
	public String getUserType()
	{
		return userType;
	}

	// User login username variable
	private String username;
	public String getUsername()
	{
		return username;
	}
	
	// User login password variable
	private String password;
	public String getPassword()
	{
		return password;
	}
	
	// Constructor
	public User(String name, String userType, String username, String password)
	{
		this.name = name;
		this.userType = userType;
		this.username = username;
		this.password = password;
	}
	
	public abstract String toString();
	
}