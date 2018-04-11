-- 5
-- a)
select Color.ColorName, group_concat(Colorant.ColorantName) as `Colorants` from Color natural join Formula natural join Colorant group by Color.ColorName order by Color.ColorName ASC;

-- b)
select Colorant.ColorantName, count(Formula.ColorantCode) as Colorant_Count from Formula natural join Colorant group by Colorant.ColorantName order by Colorant.ColorantName ASC;

--c)
select ColorantName from Colorant where ColorantName like "%oxide%";

--d)
select distinct(ColorName) from Color nautral join Formula natural join Colorant where Formula.Oz ='0' AND Colorant.ColorantName = 'Magenta';

--e)
select distinct(ColorantName), sum(Formula.Oz+Formula.Shot/48+Formula.Halfshot/96) as Total_Ounces from Colorant natural Join Formula group by ColorantName;

--f)
select ColorantName, group_concat(Color.ColorName) as Paints from Colorant natural join Formula natural join Color group by ColorantName order by ColorantName ASC;