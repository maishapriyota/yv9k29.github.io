CREATE TABLE user_info (
    user_id INTEGER GENERATED ALWAYS AS IDENTITY,
    username VARCHAR2(50),
    email VARCHAR2(100),
    -- Add more columns as needed
    CONSTRAINT pk_user_id PRIMARY KEY (user_id)
);
