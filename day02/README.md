参考YiiMongoDbSuite Manual.mht手册，实现下面的练习，并把作业提交到students内

【练习1】
创建Model：
Vote，VoteItem

Vote: {title}
VoteItem: {title, vote_id}

Vote 是投票主表 VoteItem 是投票项，关系为一对多。

1：创建练习，先保存Vote，然后保存VoteItem
2：在vote中添加getItems方法，返回所有被关联的VoteItem


【练习2】
自己动手，写一个可以利用embededDocument的model，实现CRUD

【练习3】
创建Student model，字段是：姓名、性别、年龄、所在班级
1.添加N条数据后，用EMongoCriteria实现下面的查询

a).查询所有男生
b).查询所有姓名以"王"开头的男生
c).查询所有男生并且没有班级的
d).查询年龄在18岁的所有学生，取出第5-10条数据
e).查询年龄最大的学生




